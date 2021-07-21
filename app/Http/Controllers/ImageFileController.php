<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

/*** 
 * 
 * provide feedback for user that watermark is being used or not, w/ filename or better display watermark
 * Add Padding
 * Set Main image width If greater than original width, provide feedback
 * Add JS Library: realtime watermark image placement 
 * Add Dropzone
 * UPDATE NAMES
*/
class ImageFileController extends Controller
{

    public function index()
    {
        return view('watermark');
    }


    public function latestWatermark()
    {


        foreach(new \DirectoryIterator(public_path('/uploads/watermarks')) as $item) {
            if ($item->isFile() && (empty($file) || $item->getMTime() > $file->getMTime())) {
                $file = clone $item;
            }
        }

        return $file;
    }

    public function getFileName( $file )
    {
        $file = $file->getClientOriginalName();
        $file = substr($file, 0, strpos($file, "."));

        return $file;
    }
 
    public function imageFileUpload(Request $request)
    {
        
        // ADD Carbon support
        $currentTime = date("Y-m-d",time());

        // Clean this up
        $mainImage = $request->input('mainImage');
        $mainImageSize = $request->input('mainImageSize');
        $size = $request->input('size');
        $opacity = $request->input('opacity');
        $placement = $request->input('placement');
        $xPadding = $request->input('xPadding');
        $yPadding = $request->input('yPadding');

        
        if ( $request->file('watermark'))
        {
            $this->validate($request, [
                'watermark' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
            ]);

            $watermark = $request->file('watermark');
            
            $watermarkImageName = $this->getFileName( $watermark );

            $input['watermarkImage'] = $watermarkImageName.'_'.$currentTime.'.'.$watermark->getClientOriginalExtension();


            $watermark = Image::make($watermark->getRealPath());

            $watermark->save(public_path('/uploads/watermarks').'/'.$input['watermarkImage']);
        } 
       
        $latestWatermark = $this->latestWatermark()->getPathname();


        $this->validate($request, [
            'mainImage' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
        ]);
 


        $mainImage = $request->file('mainImage');
        $mainImageName = $this->getFileName( $mainImage );

        

        // Updated Image Name
        $input['mainImage'] = $mainImageName.'_'.$currentTime.'.'.$mainImage->getClientOriginalExtension();

        $mainImage = Image::make($mainImage->getRealPath());

        if( $mainImageSize )
            $mainImage = $mainImage->resize( $mainImageSize, null, function ($constraint) {
                $constraint->aspectRatio();
            });


        

        // width + height:auto
        $watermark = Image::make( $latestWatermark )->resize( $size, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $watermark->opacity( $opacity );

        // Watermark Placement http://image.intervention.io/api/insert
        if ( $placement == "repeat")
        {
            // Watermark Repeat https://github.com/Intervention/image/issues/569 
            $x = ($xPadding) ? $xPadding : 0;
            while ($x < $mainImage->width()) {
                $y = ($yPadding) ? $yPadding : 0;

          
                while($y < $mainImage->height()) {
                      $mainImage->insert($watermark, 'top-left', $x, $y);
                      $y += $watermark->height();
                }
          
                $x += $watermark->width();
            }
            
            $mainImage->save(public_path('/uploads/watermarkedImages').'/'.$input['mainImage'] );

        }
        else 
        {
            $mainImage->insert($watermark, $placement, $xPadding, $yPadding)
            ->save(public_path('/uploads/watermarkedImages').'/'.$input['mainImage']);

        }

       

        return back()
        	->with('success','File successfully uploaded.')
        	->with('fileName',$input['mainImage']);         
    }
}