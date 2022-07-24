<section>
    <div class="container">
        <div class="bg-white rounded-xl py-8 m-4">
            <nav id="katalog" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-full text-l" >Produk</a>
                    {{ $products->links() }}
                    <div class="flex items-center" id="store-nav-content">
                        <a class="pl-3 inline-block no-underline hover:text-black">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="md:container mx-auto flex justify-center flex-wrap ">
                        @foreach ($products as $produk)
                        <div class="w-full md:w-1/4 xl:w-1/5 p-6 flex flex-col hover:grow hover:shadow-lg m-2 border-solid border-2 border-gray-200 rounded-sm bg-white " >
                            <a  href="{{ 'detail/' .$produk->id}}">
                                <img  style="width:100%; height:10rem" src="{{ $produk->gambar }}">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="text-bold">{{ $produk->product_name }}</p>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. {{number_format($produk->harga)  }}</p>
                            </a>
                        </div>
                    @endforeach
            </div>
            
        </div>
    </div>
    </section>