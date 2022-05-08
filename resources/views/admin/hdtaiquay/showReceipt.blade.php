<div class="container text-center">
    <div>
        <h3> Restaurant </h3>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>Tên món</td>
                    <td>Số lượng</td>
                    <td>Giá</td>
                    <td>Tổng</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($cthd as $sd)
                    <tr>
                        <td> {{ $loop->index + 1 }} </td>
                        <td>{{ $sd->monan_id }}</td>
                        <td>{{ $sd->soluong }}</td>
                        <td>{{ $sd->giaban }}</td>
                        <td>{{ $sd->giaban * $sd->soluong }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <table class="mycustonTable">
            <tr>
                <td class='td' colspan=2>Tổng tiền</td>
                <td colspan=2>{{ $sale->tongtien }}</td>
            </tr>
            <tr class='no-print'>
                <td colspan='2'><a href="/hdtaiquay">Go Back</a></td>
                <td colspan='2'><a href="javascript:void(0)" onClick='window.print();return false;'>Print</a></td>
            </tr>
        </table>
    </div>
    <div class="receipt-footer"> Thank You!</div>
</div>
