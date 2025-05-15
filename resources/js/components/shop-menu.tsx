import React from "react";
import { ShopMenuCategory } from "./shop-menu-category";

interface CategoryData {
  title: string;
  links: Array<{
    title: string;
    href: string;
  }>;
}

const categories: CategoryData[] = [
  {
    title: "Face care",
    links: [
      { title: "Crème", href: "#" },
      { title: "Masques", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
    ],
  },
  {
    title: "Hair care",
    links: [
      { title: "Sampoings", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
    ],
  },
  {
    title: "Body care",
    links: [
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
    ],
  },
  {
    title: "Best Sellers",
    links: [
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
      { title: "Lorem", href: "#" },
    ],
  },
];

export const ShopMenu: React.FC = () => {
  return (
    <>
      <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
        rel="stylesheet"
      />
      <div className="flex w-full justify-center items-center px-[195px] bg-[#FAFAFA] shadow-[0px_13px_19px_0px_rgba(0,0,0,0.07)] lg:px-[50px] sm:px-5">
        <div className="w-full max-w-[1050px] mx-auto flex flex-row items-start gap-[30px] lg:max-w-[991px] lg:flex-col lg:items-center sm:max-w-[640px]">
          {categories.map((category, index) => (
            <ShopMenuCategory
              key={index}
              title={category.title}
              links={category.links}
            />
          ))}
          <div className="flex-shrink-0 w-[321px] h-[368px] bg-white lg:w-full lg:h-auto">
            <img
              src="https://cdn.builder.io/api/v1/image/assets/6748326f477a456b9e05ce0199194608/23748e6c0a9aec4fe6428be2494e67b06767c330?placeholderIfAbsent=true"
              alt="Featured Product"
              className="w-full h-full object-cover"
            />
          </div>
        </div>
      </div>
    </>
  );
};
