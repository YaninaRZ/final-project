import React from "react";

export function ImageSection() {
  return (
    <div className="relative w-full overflow-hidden bg-white px-5">
      <div className="mx-auto max-w-[1200px]">
        <div className="relative aspect-[1.91] w-full overflow-hidden rounded-[30px]">
          <img
            loading="lazy"
            srcSet="https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/4c2b4d6c-0a77-4a74-9c71-c2c21d7a2b23?apiKey=6748326f477a456b9e05ce0199194608&"
            className="absolute inset-0 h-full w-full object-cover object-center"
            alt="Woman with skincare products"
          />
        </div>
      </div>
    </div>
  );
}
