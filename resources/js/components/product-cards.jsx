const people = [
  {
    title: 'lore',
    product: 'Product',
    imageUrl:
      '/images/brown.svg',
    description: 'Quia illum aut in beatae. Possimus dolores aliquid accusantium aut in ut non assumenda. Enim iusto molestias aut deleniti eos aliquid magnam molestiae. At et non possimus ab. Magni labore molestiae nulla qui.',
  },
  {
    title: 'lore',
    product: 'Product',
    imageUrl:
      '/images/woman.svg',
    description: 'Quia illum aut in beatae. Possimus dolores aliquid accusantium aut in ut non assumenda. Enim iusto molestias aut deleniti eos aliquid magnam molestiae. At et non possimus ab. Magni labore molestiae nulla qui.',
  },
  {
    title: 'lore',
    product: 'Product',
    imageUrl:
      '/images/hands.svg',
    description: 'Quia illum aut in beatae. Possimus dolores aliquid accusantium aut in ut non assumenda. Enim iusto molestias aut deleniti eos aliquid magnam molestiae. At et non possimus ab. Magni labore molestiae nulla qui.',
  },
  {
    title: 'lore',
    product: 'Product',
    imageUrl:
      '/images/guasha.svg',
    description: 'Quia illum aut in beatae. Possimus dolores aliquid accusantium aut in ut non assumenda. Enim iusto molestias aut deleniti eos aliquid magnam molestiae. At et non possimus ab. Magni labore molestiae nulla qui.',
  },
  // More people...
]

export default function ProductCards() {
  return (
    <div className="bg-white py-24 sm:py-32">
      <div className="mx-auto max-w-7xl px-6 lg:px-8">
        <div className="mx-auto max-w-2xl sm:text-center">
          <h2 className="text-34l font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">
            With you since 2010
          </h2>
          <p className="mt-6 text-lg/8 text-gray-600">
            Lorem lorem lorem lorem à la création de Lorem Lorem Club, Lorem est une aventure collective. Ensemble, nous construisons un modèle où les lorem contribuent au développement des lorem dans lesquelles ils se reconnaissent.
          </p>
        </div>
        <ul
          product="list"
          className="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-20 sm:grid-cols-2 lg:max-w-4xl lg:gap-x-8 xl:max-w-none"
        >
          {people.map((person) => (
            <li key={person.title} className="flex flex-col gap-6 xl:flex-row">
              <img alt="" src={person.imageUrl} className="aspect-5/4 w-72 flex-none rounded-2xl object-cover" />
              <div className="flex-auto">
                <h3 className="text-lg/8 font-semibold tracking-tight text-gray-900">{person.title}</h3>
                <p className="text-base/7 text-gray-600">{person.product}</p>
                <p className="mt-6 text-base/7 text-gray-600">{person.description}</p>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </div>
  )
}
