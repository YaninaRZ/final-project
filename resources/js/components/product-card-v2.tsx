import React from "react";

interface ProductCardV2Props {
  image: string;
  title: string;
  price: string;
}

export const ProductCardV2: React.FC<ProductCardV2Props> = ({
  image,
  title,
  price,
}) => {
  return (
    <div className="min-w-[240px] flex-1 w-[305px]">
      <div className="rounded-[20px] bg-white shadow-[0px_13px_19px_rgba(0,0,0,0.07)] pb-[26px]">
        <img
          src={image}
          alt={title}
          className="aspect-[1.25] w-full object-contain object-center"
        />
        <div className="mt-6 flex flex-col items-start px-7 md:px-5">
          <span className="text-base font-montserrat">{title}</span>
          <span className="mt-7 text-2xl font-montserrat">{price}</span>
          <button className="ml-auto rounded-[5px] bg-[#252B42] px-[13px] py-2 text-sm text-white">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
  );
};
