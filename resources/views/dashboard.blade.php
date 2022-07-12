<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link src="./resources/css/app.css">--}}
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body>
<h1 class="text-3xl font-bold text-center pt-6 pb-6">Main information</h1>
<div class="grid place-items-center">
    <table class="shadow-lg bg-white border-separate">
        <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Info</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Price</th>
        </tr>
        <tr>
            <td class="border px-8 py-4">The average price on cars sold for all time</td>
            <td class="border px-8 py-4">{{ $avgSumAllTime }} $</td>
        </tr>
        <tr>
            <td class="border px-8 py-4">The average price on the cars sold today</td>
            <td class="border px-8 py-4">{{ $avgSumToday }} $</td>
        </tr>
        <tr>
            <td class="border px-8 py-4">Cars sold last year, divided by day</td>
            <td class="border px-8 py-4">{{ $avgLastYear }}</td>
        </tr>
    </table>
</div>
<h2 class="text-3xl font-bold text-center pt-4">Cars for sell</h2>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div id="for-sale">
                    <table class="min-w-full text-center">
                        <thead class="border-b bg-gray-800">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4" onclick="sorting(tbody01, 0)">
                                Car model
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4" onclick="sorting(tbody01, 1)">
                                Year of production
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4" onclick="sorting(tbody01, 2)">
                                Color
                            </th>
                            <th scope="col" class="text-sm font-medium text-white px-6 py-4" onclick="sorting(tbody01, 3)">
                                Price
                            </th>
                        </tr>
                        </thead>
                        <tbody id="tbody01">
                        @foreach($carList as $cars)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $cars->model }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $cars->year }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $cars->color }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap price">
                                    {{ $cars->price }} $
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-3xl font-bold text-center pb-7 pt-3">
    Info about sells
</h1>
<div class="grid place-items-center">
    <table class="shadow-lg bg-white">
        <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Date</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Number of cars sold</th>
        </tr>
        @foreach($sellsPerDay as $sells => $item)
            <tr>
                <td class="border px-8 py-4">{{ $item->sell_day }}</td>
                <td class="border px-8 py-4">{{ $item->total_price }}</td>
            </tr>
        @endforeach
    </table>
</div>
<script src="/assets/js/sort.js"></script>
</body>
