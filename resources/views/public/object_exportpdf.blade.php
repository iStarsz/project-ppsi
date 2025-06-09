<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Detail - PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
    
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }
    
        h1 {
            font-size: 26px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    
        .object-detail {
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
        }
    
        .object-detail p {
            line-height: 1.6;
            margin: 10px 0;
        }
    
        .object-detail p strong {
            color: #333;
        }
    
        .object-image-wrapper {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center; /* Memusatkan gambar */
        }
    
        .object-image {
            display: inline-block;
            margin-bottom: 4px;
            width: 100%;  /* Membuat gambar mengikuti lebar container */
        }
    
        .object-image img {
            width: 100%; /* Gambar mengisi lebar container */
            height: auto; /* Menjaga proporsi tinggi gambar */
            border-radius: 8px;
            display: block;  /* Untuk menghilangkan ruang di bawah gambar */
            margin: 0 auto; /* Menjaga gambar tetap terpusat */
        }
    
        .download-btn {
            display: {{ isset($isPdfExport) ? 'none' : 'inline-block' }};
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #AAA577;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
        }
    
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #777;
        }
    
        .footer p {
            margin: 5px 0;
        }
    
        .footer .company-info {
            font-size: 14px;
            color: #444;
        }
    
        .footer .company-info p {
            margin: 5px 0;
        }
    </style>
    
    
</head>

<body>
    <div class="container">
        <div style="text-align: center;">
            <img src="/public/assets/img/ambrlogo.png" alt="Royal Ambarrukmo" style="width: 250px; height:auto;">
        </div>
        <h1>{{ $object->name_english }}</h1>
        <!-- Tombol Download hanya muncul di halaman web, tidak di PDF -->
        <a href="{{ route('object.downloadPdf', ['id' => $object->id]) }}" class="download-btn">
            Download PDF
        </a>

        <div class="object-image-wrapper">
            @if($object->image_url && is_array(json_decode($object->image_url)))
                @foreach(json_decode($object->image_url) as $imageUrl)
                    <div class="object-image">
                        <img src="{{ asset('images/aoqr_objects/' . basename($imageUrl)) }}" alt="Object Image">
                    </div>
                @endforeach
            @else
                <p>No images available.</p>
            @endif
        </div>

        <div class="object-detail">
            <p><strong>Location:</strong> {{ $object->location_english }}</p>
            <p><strong>Description:</strong></p>
            <p>{!! nl2br(e($object->description_english)) !!}</p>
        </div>

        <div class="footer">
            <div class="company-info">
                <p><strong>ROYAL AMBARRUKMO YOGYAKARTA</strong></p>
                <p>Jalan Laksda Adisucipto No. 81, Yogyakarta 55281 - Indonesia</p>
                <p>Tel: +62 274 488 488</p>
                <p>Email: info@royalambarrukmo.com</p>
            </div>
            <p>© Royal Ambarrukmo Yogyakarta 2025</p>
        </div>
    </div>
</body>

</html>
