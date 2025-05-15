import React from "react";

interface ProductCardProps {
  image: string;
  title: string;
  altText: string;
}

export const ProductGridCard: React.FC<ProductCardProps> = ({
  image,
  title,
  altText,
}) => {
  return (
    <div className="flex flex-col items-center w-[320px] p-4 bg-white lg:w-[280px] md:w-[240px] sm:w-full hover:opacity-90 transition-opacity">
      <img
        src={image}
        alt={altText}
        className="w-full h-[305px] object-cover"
      />
      <div className="flex flex-col items-center mt-4">
        <span className="font-['Inter'] text-[19px] text-black mb-2">
          {title}
        </span>
        <span className="font-['Inter'] text-[19px] text-black cursor-pointer">
          Add
        </span>
      </div>
    </div>
  );
};
