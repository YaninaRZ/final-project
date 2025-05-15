import React from "react";
import { ProductGridCard } from "./product-grid-card";

const products = [
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/df3cb67cd418f54cf51b609e12d883b347248a15?placeholderIfAbsent=true",
    title: "Anti Acne Face Wash",
    altText: "Anti Acne Face Wash",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/cc7f3bb4d04b585dc0cb0964802984a5343d0a8b?placeholderIfAbsent=true",
    title: "Vitamin C Hand & Nail Cream",
    altText: "Vitamin C Hand & Nail Cream",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/69501db27ca58f61db1093923fcd01b60ab0b35c?placeholderIfAbsent=true",
    title: "Vitamin C Clay Face Mask",
    altText: "Vitamin C Clay Face Mask",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/fdd506b03b370ca351f3d623e621f9e8fd4c920d?placeholderIfAbsent=true",
    title: "10 In 1 Active Miracle",
    altText: "10 In 1 Active Miracle",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/5225d211ab09d2b29563bd330cc620248036a915?placeholderIfAbsent=true",
    title: "Anti Acne Face Wash",
    altText: "Anti Acne Face Wash",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/df3cb67cd418f54cf51b609e12d883b347248a15?placeholderIfAbsent=true",
    title: "Anti Acne Face Wash",
    altText: "Anti Acne Face Wash",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/cc7f3bb4d04b585dc0cb0964802984a5343d0a8b?placeholderIfAbsent=true",
    title: "Vitamin C Hand & Nail Cream",
    altText: "Vitamin C Hand & Nail Cream",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/69501db27ca58f61db1093923fcd01b60ab0b35c?placeholderIfAbsent=true",
    title: "Vitamin C Clay Face Mask",
    altText: "Vitamin C Clay Face Mask",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/fdd506b03b370ca351f3d623e621f9e8fd4c920d?placeholderIfAbsent=true",
    title: "10 In 1 Active Miracle",
    altText: "10 In 1 Active Miracle",
  },
  {
    image:
      "https://cdn.builder.io/api/v1/image/assets/TEMP/5225d211ab09d2b29563bd330cc620248036a915?placeholderIfAbsent=true",
    title: "Anti Acne Face Wash",
    altText: "Anti Acne Face Wash",
  },
];

export const ProductGrid: React.FC = () => {
  return (
    <>
      <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
        rel="stylesheet"
      />
      <div className="flex flex-wrap justify-center gap-6 px-12 py-16 bg-[#f5f5f5] lg:px-8 lg:py-12 md:px-6 md:py-8 sm:p-4">
        {products.map((product, index) => (
          <ProductGridCard
            key={index}
            image={product.image}
            title={product.title}
            altText={product.altText}
          />
        ))}
      </div>
    </>
  );
};
