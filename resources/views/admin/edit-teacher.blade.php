<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pengajar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-2">
                        <a href="{{ route('teacher.index') }}"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                    </div>
                    <form action="{{ route('teacher.update', $teacher->id_teacher) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h2 class=""></h2>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Nama
                                Guru</label>
                            <input type="text" id="base-input" name="teacher_name"
                                value="{{ $teacher->teacher_name }}"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan pengajar">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Alumni
                            </label>
                            <input type="text" id="base-input" name="alumni" value="{{ $teacher->alumni }}"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan asal alumni">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Mata Pelajaran
                            </label>
                            <select id="id_subjects" name="id_subjects"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id_subjects }}"
                                        @if ($teacher->id_subjects == $subject->id_subjects) @selected(true) @endif>
                                        {{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Gambar
                                Utama</label>
                            <input name="teacher_img"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none "
                                aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                value="{{ $teacher->teacher_img }}">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Masukan
                                foto untuk pengajar / guru</div>
                        </div>
                        <div class="flex justify-end gap-1">
                            <button type="reset"
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Reset</button>
                            <button type="submit"
                                class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
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
        <script>
            $(document).ready(function() {
                CKEDITOR.replaceAll('description_school');
            });
        </script>
    @endpush
</x-app-layout>
