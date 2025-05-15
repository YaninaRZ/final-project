import React from "react";
import { ProductCardV2 } from "./product-card-v2";

interface Product {
  image: string;
  title: string;
  price: string;
}

interface ProductSectionProps {
  title: string;
  products: Product[];
}

export const ProductSection: React.FC<ProductSectionProps> = ({
  title,
  products,
}) => {
  return (
    <>
      <h2 className="mt-[61px] text-2xl font-montserrat font-bold text-[#252B42] lg:mt-10">
        {title}
      </h2>
      <div className="mt-[61px] flex w-full max-w-[1274px] flex-wrap items-start justify-start gap-8 px-8 py-16 lg:mt-10 lg:px-5">
        {products.map((product, index) => (
          <ProductCardV2
            key={index}
            image={product.image}
            title={product.title}
            price={product.price}
          />
        ))}
      </div>
    </>
  );
};
