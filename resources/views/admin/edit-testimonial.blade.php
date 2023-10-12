<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Testimoni') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-2">
                        <a href="{{ route('testimonial.index') }}"
                            class=" px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                    </div>
                    <form action="{{ route('testimonial.update', $testimonial->id_testimonial) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h2 class=""></h2>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Nama
                            </label>
                            <input type="text" name="name"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan nama" value="{{ $testimonial->name }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Asal Sekolah
                            </label>
                            <input type="text" name="school"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan asal sekolah" value="{{ $testimonial->school }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Di Terima di
                            </label>
                            <input type="text" name="accepted"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan di terima di sekolah" value="{{ $testimonial->accepted }}"
                                required>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskripsi
                            </label>
                            <textarea id="message" rows="4" name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Masukan Deskripsi" required>{{ $testimonial->description }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Gambar
                                Utama</label>
                            <input name="img_testimonial"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none "
                                aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                value="{{ $testimonial->img_testimonial }}" required>
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Masukan
                                foto untuk testimoni</div>
                        </div>
                        <div class="flex justify-end gap-1">
                            <button type="reset"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Reset</button>
                            <button type="submit"
                                class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('css')
    @endpush
    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    @endpush
    @push('scripts')
    @endpush
</x-app-layout>
