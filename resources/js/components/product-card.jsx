import React from "react";

export const ProductCard = ({ image, title }) => {
  return (
    <div className="flex flex-col items-center w-[280px] rounded-[5px] shadow-sm p-4 bg-white md:w-[220px] sm:w-full">
      <img
        src={image}
        alt={title}
        className="w-full h-[305px] object-cover rounded-[5px]"
      />
      <div className="flex flex-col items-center mt-4">
        <span className="font-inter text-[19px] text-black mb-2">{title}</span>
        <span className="font-inter text-[19px] text-black cursor-pointer">
          Add
        </span>
      </div>
    </div>
  );
};
