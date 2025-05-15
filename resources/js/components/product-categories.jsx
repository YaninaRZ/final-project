export function ProductCategories() {
  return (
    <div className="w-full bg-[#f5f5f5]">
      <div className="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2">
        <div className="relative h-[600px] w-full overflow-hidden lg:h-[500px] sm:h-[400px]">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a884bcccb5d074d787eb2079473fd3e9a33f8305?placeholderIfAbsent=true"
            alt="Body Wash"
            className="h-full w-full object-cover"
          />
          <div className="absolute inset-0 flex items-center justify-center">
            <div className="bg-black/50 px-16 py-12">
              <span className="font-inter text-2xl uppercase text-white sm:text-xl">
                Body Wash
              </span>
            </div>
          </div>
        </div>

        <div className="relative h-[600px] w-full overflow-hidden lg:h-[500px] sm:h-[400px]">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/9e02f9a2cd40d29e85f7ff92d05d20d2460ada96?placeholderIfAbsent=true"
            alt="Face Wash"
            className="h-full w-full object-cover"
          />
          <div className="absolute inset-0 flex items-center justify-center">
            <div className="bg-black/50 px-16 py-12">
              <span className="font-inter text-2xl uppercase text-white sm:text-xl">
                Face Wash
              </span>
            </div>
          </div>
        </div>

        <div className="relative h-[600px] w-full overflow-hidden lg:h-[500px] sm:h-[400px]">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/05e223a3acc9957a4ac7ed34827c1687219317f1?placeholderIfAbsent=true"
            alt="Cleanser"
            className="h-full w-full object-cover"
          />
          <div className="absolute inset-0 flex items-center justify-center">
            <div className="bg-black/50 px-16 py-12">
              <span className="font-inter text-2xl uppercase text-white sm:text-xl">
                Cleanser
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
