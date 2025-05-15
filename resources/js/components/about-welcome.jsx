export default function AboutSection() {
    return (
      <div className="relative bg-white w-full h-screen">
        <div className="mx-auto max-w-none lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8 h-full">
          <div className="px-6 pt-10 pb-24 sm:pb-32 lg:col-span-7 lg:px-0 lg:pt-40 lg:pb-48 xl:col-span-6 h-full">
            <div className="mx-auto max-w-lg lg:mx-0 h-full flex flex-col justify-center">

              <h1 className="mt-24 text-5xl font-semibold tracking-tight text-pretty text-gray-900 sm:mt-10 sm:text-7xl">
                Skinn-inspired
                care
              </h1>
            </div>
          </div>
          <div className="relative lg:col-span-5 lg:-mr-8 xl:absolute xl:inset-0 xl:left-1/2 xl:mr-0 h-full">
            <img
              alt=""
              src="/images/serum.svg"
              className="aspect-3/2 w-full bg-gray-50 object-cover lg:absolute lg:inset-0 lg:aspect-auto lg:h-full"
            />
          </div>
        </div>
      </div>
    )
  }
  