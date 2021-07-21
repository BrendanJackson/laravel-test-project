<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Image Manipulation</title>
</head>

<body>
    <div class="container mt-4" style="max-width: 600px">
        <h2 class="mb-5">Watermark</h2>

        <form action="{{route('image.watermark')}}" enctype="multipart/form-data" method="post">
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>


            <div class="col-md-12 mb-3 text-center">
                <strong>Manipulated image:</strong><br />
                <img src="/uploads/watermarkedImages/{{ Session::get('fileName') }}" width="600px"/>

                <a style="max-width:50%;" href="/uploads/watermarkedImages/{{ Session::get('fileName') }}" download> 
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>DOWNLOAD IMAGE </span>
                    </button>
                </a>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-3">
            <!-- Image to be watermwarked -->
                <label for="mainImage">Main Image</label>
                <input type="file" name="mainImage" class="form-control"  id="formFile" required>
            </div>

            <!--  -->
            <div class="mb-3">
                <label for="mainImageSize">Main Image Size</label>
                <input type="text" name="mainImageSize" id="">
            </div>


            <!-- Watermark -->
            <div class="mb-3">
                <label for="file">Upload Watermark OR skip to use the latest uploaded watermark</label>
                <input type="file" name="watermark" class="form-control" >
            </div>


            

            <!--  -->
            <div class="mb-3">
                <label for="size">size</label>
                <input type="text" name="size" id="" required>
            </div>
            
            <!--  -->
            <div class="mb-3">
                <label for="opacity">opacity %</label>
                <input type="number" name="opacity" id="" min="0" max="100" step="1" required>
            </div>
            
            <!--  -->
            <div class="mb-3">
                <label for="placement">placement or repeat</label>
                <!-- <input type="text" name="placement" id=""> -->
                <select name="placement" id="placemnt" required>
                    <option value="top-left">top-left</option>
                    <option value="top">top</option>
                    <option value="top-right">top-right</option>
                    <option value="left">left</option>
                    <option value="center">center</option>
                    <option value="right">right</option>
                    <option value="bottom-left">bottom-left</option>
                    <option value="bottom">bottom</option>
                    <option value="bottom-right">bottom-right</option>
                    <option value="repeat">repeat</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="xPadding">X Axis Padding PX </label>
                <input type="number" name="xPadding" id="" min="0"  step="1">
            </div>

            <div class="mb-3">
                <label for="yPadding">Y Axis Padding PX <label>
                <input type="number" name="yPadding" id="" min="0"  step="1">
            </div>

            <!-- !TODO: FIX  -->
            <!-- <div class="mb-3">
                <label for="watermarkedFileName">Watermarked File Name</label>
                <input type="text" name="watermarkedFileName" id="">
            </div>
             -->
             
            <!--  -->
            <!-- <div class="mb-3">
                <label for="repeat">repeat</label>
                <input type="text" name="repeat" id="">
            </div>
             -->

            <div class="d-grid mt-4">
                <button type="submit" name="submit" class="btn btn-primary">
                    Watermark your image
                </button>
            </div>
        </form>
    </div>
    
</body>

</html>