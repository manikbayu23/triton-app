<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Variation') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('list_program.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h2 class="">Tambah Variasi</h2>
                        <div class="relative overflow-x-auto">
                            <table id="table-variation"
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-4 ">
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
                                            <select id="id_level" name="id_level"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Kelas</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id_level }}">{{ $level->level_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select id="id_room" name="id_room"
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
                                            <select id="id_room" name="id_room"
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
                                            <input type="text" id="base-input" name="program_name"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Rp 20000" required>
                                        </td>
                                        <td>
                                            <input type="text" id="base-input" name="program_name"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="20" required>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div> <button type="button" onclick="addRow()"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                                Row</button></div>
                        <div class="flex justify-end gap-2">
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
                
                                            <select id="id_level" name="id_level"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                required>
                                                <option value="" selected>Pilih Kelas</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id_level }}">{{ $level->level_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                      
                `;
                cellRoom.innerHTML = `
                                            <select id="id_room" name="id_room"
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
                                            <select id="id_room" name="id_room"
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
                                            <input type="text" id="base-input" name="program_name"
                                                class="bg-white border border-gray-300 bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Rp 20000" required>
                `;
                cellCapacity.innerHTML = `
                                            <input type="text" id="base-input" name="program_name"
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
