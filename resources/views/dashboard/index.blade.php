@extends('layout.plantilla')
@section('contenido')
<main class="main-content w-full pb-8">
    <div
        class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12 lg:col-span-12">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Lot No</th>
                            <th>Customer</th>
                            <th>AWB</th>
                            <th>Carrier</th>
                            <th>Broker</th>
                            <th>Country</th>
                            <th>Inspection Date</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lots as $lot)
                            <tr>
                                <td>{{ $lot->Lot_No }}</td>
                                <td>{{ $lot->name }}</td>
                                <td>{{ $lot->AWB }}</td>
                                <td>{{ $lot->Carrier }}</td>
                                <td>{{ $lot->Supplier }}</td>
                                <td>{{ $lot->country }}</td>
                                <td>{{ $lot->Inspection_Date }}</td>
                                <td>
                                    <a href="{{ $lot->url }}" target="_blank">
                                        <i class="fas fa-download" style="font-size:24px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</main>
@endsection
