import React, { lazy, Suspense } from "react";
import { usePage } from '@inertiajs/react';  // <-- pour récupérer les props Inertia
import { Card, CardBody, Typography } from "@material-tailwind/react";
import merge from "deepmerge";

const Chart = lazy(() => import("react-apexcharts"));

function AreaChart({ height = 350, series, colors, options }) {
  const chartOptions = React.useMemo(() => ({
    colors,
    ...merge(
      {
        chart: {
          height,
          type: "area",
          background: "transparent",
          zoom: { enabled: false },
          toolbar: { show: false },
        },
        title: { show: "Sale Graph" },
        dataLabels: { enabled: false },
        legend: { show: false },
        markers: { size: 0, strokeWidth: 0, strokeColors: "transparent" },
        stroke: { curve: "smooth", width: 2 },
        grid: {
          show: false,
          borderColor: "transparent",
          strokeDashArray: 5,
          xaxis: { lines: { show: false } },
          padding: { top: 5, right: 20 },
        },
        tooltip: { theme: "light" },
        yaxis: {
          labels: {
            style: { colors: "#757575", fontSize: "12px", fontFamily: "inherit", fontWeight: 300 },
          },
        },
        xaxis: {
          axisTicks: { show: false },
          axisBorder: { show: false },
          labels: {
            style: { colors: "#757575", fontSize: "12px", fontFamily: "inherit", fontWeight: 300 },
          },
        },
        fill: {
          type: "gradient",
          gradient: { shadeIntensity: 1, opacityFrom: 0, opacityTo: 0, stops: [0, 100] },
        },
      },
      options || {}
    ),
  }), [height, colors, options]);

  return (
    <Suspense fallback={<div>Chargement du graphique...</div>}>
      <Chart type="area" height={height} series={series} options={chartOptions} />
    </Suspense>
  );
}

export default function LineChart() {

  // Ici tu récupères tes données passées par Laravel via Inertia
  const { sales2025 } = usePage().props;
  console.log(sales2025);
  // Prépare la série avec les vraies données
  const series = [
    {
      name: "2025 Sales",
      data: sales2025 || Array(12).fill(0),  // fallback au cas où la donnée n'est pas dispo
    },
  ];

  const totalSales = series[0].data.reduce((acc, val) => acc + val, 0);

  return (
    <section className="m-10">
      <Card>
        <CardBody className="!p-2">
          <div className="flex gap-2 flex-wrap justify-between px-4 !mt-4 ">
            <Typography variant="h3" color="blue-gray">
              ${totalSales.toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </Typography>
            <div className="flex items-center gap-6">
              <div className="flex items-center gap-1">
                <span className="h-2 w-2 bg-blue-500 rounded-full"></span>
                <Typography variant="small" className="font-normal text-gray-600">
                  2025
                </Typography>
              </div>
            </div>
          </div>
          <AreaChart
            colors={["#4CAF50"]}
            options={{
              xaxis: {
                categories: [
                  "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
                ],
              },
            }}
            series={series}
          />
        </CardBody>
      </Card>
    </section>
  );
}
