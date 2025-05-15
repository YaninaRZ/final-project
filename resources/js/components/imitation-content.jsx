export default function HeroImitaton() {
    return (
      <div className="bg-white">
        <div className="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
          <div className="mx-auto max-w-2xl text-center">
            <h2 className="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">
              Imitate the skin
            </h2>
            <p className="mx-auto mt-6 max-w-xl text-lg/8 text-pretty text-gray-600">
              The skin is an advanced technology that has inspired us to create our skincare. Designed to mimic and strengthen the skin, our biomimetic treatments are better absorbed, delivering enhanced effectiveness and visibly healthier skin.
            </p>
          </div>
        </div>
        
        <div className="w-full flex justify-center mb-[100px]">
          <img
            src="/images/drop.svg"
            alt="Skin technology"
            className="max-w-md w-full h-auto object-cover"
          />
        </div>
      </div>
    )
  }
  