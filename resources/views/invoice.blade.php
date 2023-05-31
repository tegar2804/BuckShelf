<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuckShelf | {{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @foreach($css_name as $css)
    <link href="{{ asset('css/'.$css.'.css') }}" rel="stylesheet"/>
    @endforeach
  </head>
  <body>
    <div class="container">
        <div class="custom-mt">
            <div class="invoice-container">
                <div class="close-invoice">
                    <a href="/history"><i class="fas fa-close"></i></a>
                </div>
                <div class="logo-invoice">
                    <img src="{{ asset('storage/images/navbr/logo.svg') }}" alt="logo">
                </div>
                <div class="info-invoice">
                    <h1>Nota Transaksi</h1>
                    <h3>Detail Transaksi</h3>
                    <div class="detail-invoice">
                        <div class="left">
                            <ul>
                                <li>Nama</li>
                                <li>ID Order</li>
                                <li>Tanggal Order</li>
                                <li>Metode Pembayaran</li>
                            </ul>
                        </div>
                        <div class="right">
                            <ul>
                                <li>{{ $order->user->name }}</li>
                                <li>{{ "BS00".$order->id }}</li>
                                <li>{{ (new DateTime($order->order_at))->format('d M Y') }}</li>
                                <li>{{ $order->method->name }}</li>
                            </ul>
                        </div>
                    </div>
                    <h3>Detail Buku</h3>
                    <div class="container-detail-book">
                    @foreach($order->detail_order as $item)
                        <div class="detail-invoice">
                            <div class="left">
                                <p>{{ $item->book->title }}</p>
                            </div>
                            <div class="right">
                                <p>{{ 'Rp'.number_format($item->book->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="detail-invoice">
                        <div class="left">
                            <p>Total Buku:</p>
                            <h3>Total Harga: </h3>
                        </div>
                        <div class="right">
                            <p>x{{ $order->book_total }}</p>
                            <h3>{{ 'Rp'.number_format($order->price_total, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>