<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tra cứu điểm thi Đại Học</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top:40px">
                <h4>Tra cứu điểm thi THPTQG</h4>
                <hr>
                <form action="{{ route('web.find') }}" method="GET">

                    <div class="form-group">
                        <label for="">Nhập số báo danh</label>
                        <input type="text" class="form-control" name="query" placeholder="Nhập số báo danh của thí sinh....." value="{{ request()->input('query') }}">
                        <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Xem kết quả</button>
                    </div>
                </form>
                <br>
                <br>
                <hr>
                <br>
                @if(isset($countries))

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Toán</th>
                            <th>Văn</th>
                            <th>Ngoại Ngữ</th>
                            <th>Vật Lý</th>
                            <th>Hóa Học</th>
                            <th>Sinh Học</th>
                            <th>Lịch Sử</th>
                            <th>Địa Lý</th>
                            <th>Giáo Dục CD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($countries) > 0)
                        @foreach($countries as $countrie)
                        <tr>
                            <td>{{ $countrie->toan }}</td>
                            <td>{{ $countrie->van }}</td>
                            <td>{{ $countrie->ngoai_ngu }}</td>
                            <td>{{ $countrie->ly }}</td>
                            <td>{{ $countrie->hoa }}</td>
                            <td>{{ $countrie->sinh }}</td>
                            <td>{{ $countrie->lich_su }}</td>
                            <td>{{ $countrie->dia_ly }}</td>
                            <td>{{ $countrie->GDCD }}</td>
                        </tr>
                        @endforeach
                        @else

                        <tr>
                            <td>No result found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <div class="pagination-block">
                    <?php //{{ $countries->links('layouts.paginationlinks') }} 
                    ?>
                    {{ $countries->appends(request()->input())->links('layouts.paginationlinks') }}
                </div>

                @endif
            </div>
        </div>
    </div>
</body>

</html>