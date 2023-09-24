<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Program') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-2">
                        <a href="{{ route('list_program.index') }}"
                            class=" px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</a>
                    </div>
                    <form action="{{ route('list_program.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class=""></h2>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Nama
                                Program</label>
                            <input type="text" id="base-input" name="program_name"
                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Masukan Nama Program">
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskirpsi
                                Depan</label>
                            <textarea id="" rows="4" name="front_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Masukan Deskripsi Depan"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskripsi
                                Utama</label>
                            <textarea id="message" rows="4" name="main_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Masukan Deskripsi Utama"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Gambar
                                Utama</label>
                            <input name="program_img"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none "
                                aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Masukan
                                foto untuk tampilan depan</div>
                        </div>

                        <div class="relative overflow-x-auto mb-2">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Kategori</label>
                            <table id="table-variation"
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400  ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Kelas
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ruangan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kapasitas
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select id="id_level" name="id_level[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Kelas</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id_levels }}">{{ $level->level_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="id_room" name="id_room[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Ruangan</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id_room }}">{{ $room->room_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="id_time" name="id_time[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Waktu</option>
                                                @foreach ($times as $time)
                                                    <option value="{{ $time->id_time }}">
                                                        @if ($time->day == 'day1')
                                                            Senin - Kamis
                                                        @elseif ($time->day == 'day2')
                                                            Selasa - Jumat
                                                        @else
                                                            Rabu - Sabtu
                                                        @endif

                                                        <span>/</span>
                                                        Pukul:
                                                        @if ($time->time == 'time1')
                                                            15.00 - 17.00
                                                        @else
                                                            17.20 - 19.30
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="base-input" name="price[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Rp 20000" required>
                                        </td>
                                        <td>
                                            <input type="text" id="base-input" name="capacity[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="20" required>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="mb-6"> <button type="button" onclick="addRow()"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                                Row</button></div>


                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskirpsi
                                SMA</label>
                            <textarea id="message" rows="4" name="senior_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 description_school"
                                placeholder="Kosongkan bila tidak ada"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskirpsi
                                SMP</label>
                            <textarea id="message" rows="4" name="junior_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 description_school"
                                placeholder="Kosongkan bila tidak ada"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="base-input" class="block mb-2 text-sm font-medium text-dark ">Deskirpsi
                                SD</label>
                            <textarea id="message" rows="4" name="elementary_description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 description_school"
                                placeholder="Kosongkan bila tidak ada"></textarea>
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
        <script>
            $(document).ready(function() {
                CKEDITOR.replaceAll('description_school');
            });
        </script>
        <script>
            let rowCount = 1;

            function addRow() {
                let table = document.getElementById("table-variation");
                let newRow = table.insertRow(-1); // -1 appends the row at the end of the table

                // Insert cells into the new row
                let cellLevel = newRow.insertCell(0);
                let cellRoom = newRow.insertCell(1);
                let cellTime = newRow.insertCell(2);
                let cellPrice = newRow.insertCell(3);
                let cellCapacity = newRow.insertCell(4);
                let cellAction = newRow.insertCell(5);

                rowCount++;

                // Set the innerHTML of the cells (you can add your desired input elements here)
                cellLevel.innerHTML = `
                
                                            <select name="id_level[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Kelas</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id_levels }}">{{ $level->level_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                      
                `;
                cellRoom.innerHTML = `
                                            <select  name="id_room[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Ruangan</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id_room }}">{{ $room->room_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                `;
                cellTime.innerHTML = `
                                            <select  name="id_time[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Waktu</option>
                                                @foreach ($times as $time)
                                                    <option value="{{ $time->id_time }}">
                                                        @if ($time->day == 'day1')
                                                            Senin - Kamis
                                                        @elseif ($time->day == 'day2')
                                                            Selasa - Jumat
                                                        @else
                                                            Rabu - Sabtu
                                                        @endif

                                                        <span>/</span>
                                                        Pukul:
                                                        @if ($time->time == 'time1')
                                                            15.00 - 17.00
                                                        @else
                                                            17.20 - 19.30
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                 `;
                cellPrice.innerHTML = `
                                            <input type="text"  name="price[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Rp 20000" required>
                `;
                cellCapacity.innerHTML = `
                                            <input type="text"  name="capacity[]"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="20" required>
                                        
            `;
                cellAction.innerHTML = `
            <button  class="deleteRowTapproval text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="deleteRowTapproval(this)"><i class="fa fa-times"></i>Hapus</button>
            `;
            }

            function deleteRowTapproval(button) {
                let table = document.getElementById("table-variation");
                let rowIndex = button.parentNode.parentNode.rowIndex;
                table.deleteRow(rowIndex);

                rowCount = rows.length - 1; // Update rowCount to the correct value
            }
        </script>
    @endpush
</x-app-layout>
