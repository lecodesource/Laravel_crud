<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold text-gray-900">Liste des Produits</h1>

                </div>

                <a href="{{ route('Products.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nouveau Produit
                </a>
            </div>

            <!-- Barre de recherche et filtres -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher un produit..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition-colors duration-200">
                            <div class="absolute left-3 top-2.5 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <select
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-500">
                            <option>Trier par</option>
                            <option>Prix croissant</option>
                            <option>Prix décroissant</option>
                            <option>Nom A-Z</option>
                            <option>Nom Z-A</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Liste des produits -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Prix</th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantité</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($produits as $product)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                {{ $product->id }}</div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $product->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate">{{ $product->description }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate">{{ $product->price }}FCFA
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate">{{ $product->quantity }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <form action="{{ route('Products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <a href="{{ route('Products.edit', $product->id) }}"
                                            class="bg-blue-400">MODIFIER</a>


                                            <button class="bg-red-600">SUPPRIMER</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    <!-- Message de notification -->
    @if (session('success'))
        <div
            class="fixed bottom-4 right-4 bg-green-50 text-green-800 px-6 py-4 rounded-lg shadow-lg border-l-4 border-green-400 animate-fade-in-up">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif
</body>

</html>
