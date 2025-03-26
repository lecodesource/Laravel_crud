<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- En-tête du formulaire -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Créer un nouveau produit</h1>
                <p class="text-lg text-gray-600">Remplissez les informations ci-dessous pour ajouter un nouveau produit
                </p>
            </div>

            <!-- Card du formulaire -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ Route('Products.store') }}" class="space-y-8">
                        @csrf

                        <!-- Nom du produit -->
                        <div class="group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nom du produit
                            </label>
                            <input type="text" id="name" name="name"
                                class="form-input block w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all duration-200 py-3 px-4 text-gray-700 text-base">
                            @error('name')
                                <p class="mt-2 text-sm text-red-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Grid pour Quantité et Prix -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Quantité -->
                            <div>
                                <label for="quantity" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Quantité
                                </label>
                                <div class="relative">
                                    <input type="number" id="quantity" name="quantity"
                                        class="form-input block w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all duration-200 py-3 px-4 text-gray-700">
                                </div>
                                @error('quantity')
                                    <p class="mt-2 text-sm text-red-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Prix -->
                            <div>
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Prix
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">

                                    </div>
                                    <input type="number" step="0.01" id="price" name="price"
                                        class="form-input block w-full rounded-xl border-2 border-gray-200 pl-8 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all duration-200 py-3 px-4 text-gray-700">
                                </div>
                                @error('price')
                                    <p class="mt-2 text-sm text-red-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="form-textarea block w-full rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all duration-200 py-3 px-4 text-gray-700"></textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="pt-6">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 text-lg">
                                Créer le produit
                            </button>
                        </div>
                    </form>

                    <!-- Message de succès -->
                    @if (session('success'))
                        <div class="mt-8 rounded-xl bg-green-50 p-4 border-l-4 border-green-400">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-base font-medium text-green-800">
                                        Produit enregistré avec succès
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
