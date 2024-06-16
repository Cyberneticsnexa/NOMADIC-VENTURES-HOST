<?php
use App\Models\UserImage;
/*
----------------------------------------------------------------------------------------------------------
UPLOAD IMAGE
----------------------------------------------------------------------------------------------------------
*/

function uploadImage( $image, $disk )
 {
    $extension = 'png';
    $name = $image->getClientOriginalName();
    $unique_name = md5( $name . time() );
    $full_name = $unique_name . '.' . $extension;

    Storage::disk( 'image' )->put( $disk.'/'.$full_name, File::get( $image ) );

    return $full_name;
}

/*
----------------------------------------------------------------------------------------------------------
GET UPLOAD IMAGE
----------------------------------------------------------------------------------------------------------
*/

function getUploadImage( $image, $disk )
 {

    if ( $image ) {
        $filePath = 'images/' .$disk.'/'. $image;
        $imageUrl =  config( 'site-specific.live-path' ) . '/public/uploads/' . $filePath;
        return $imageUrl;
    }
    return null;
}

if (!function_exists('getBase64Image')) {
    function getBase64Image($image, $disk)
    {
        // Construct full file path
        $filePath = 'images/' . $disk . '/' . $image;
        $imageUrl = config('site-specific.live-path') . '/uploads/' . $filePath;

        // Check if the file exists
        if (!Storage::disk('image')->exists($disk . '/' . $image)) {
            return null; // Or handle error as per your application logic
        }

        // Read image file contents
        $imageFile = Storage::disk('image')->get($disk . '/' . $image);

        // Encode image to base64
        $base64Image = base64_encode($imageFile);

        // Build data URI
        $base64ImageSrc = 'data:image/png;base64,' . $base64Image;

        return $base64ImageSrc;
    }
}

/*
----------------------------------------------------------------------------------------------------------
HELPER FUNCTION GET AUTH IMAGE
----------------------------------------------------------------------------------------------------------
*/

function getAuthImage( $disk )
 {
    $image = UserImage::select( 'image_name' )->where( 'user_id', Auth::id() )->latest()->first();
    if ( $image ) {
        return getUploadImage( $image->image_name, $disk );
    }
    return null;
}


/*
----------------------------------------------------------------------------------------------------------
HELPER FUNCTION UPLOAD ATTACHMENT
----------------------------------------------------------------------------------------------------------
*/

function uploadAttachment( $attachment, $disk )
 {
    $extension = $attachment->getClientOriginalExtension();
    $name = $attachment->getClientOriginalName();
    $unique_name = md5( $name . time() ) .$name;
    $full_name = $unique_name . '.' . $extension;

    Storage::disk( 'attachment' )->put( $disk.'/'.$full_name, File::get( $attachment ) );

    return $full_name;
}

/*
----------------------------------------------------------------------------------------------------------
HELPER FUNCTION GET UPLOAD ATTACHMENT
----------------------------------------------------------------------------------------------------------
*/

function getUploadAttachment( $attachment, $disk )
 {

    if ( $attachment ) {
        $filePath = 'attachment/' .$disk.'/'.  $attachment;
        $attachmentUrl =  'public/uploads/'.$filePath;
        return $attachmentUrl;
    }
    return null;
}

/*
----------------------------------------------------------------------------------------------------------
HELPER FUNCTION UPLOAD ATTACHMENT
----------------------------------------------------------------------------------------------------------
*/

function uploadVideo( $video, $disk )
 {
    $extension = $video->getClientOriginalExtension();
    $name = $video->getClientOriginalName();
    $unique_name = md5( $name . time() ) .$name;
    $full_name = $unique_name . '.' . $extension;

    Storage::disk( 'video' )->put( $disk.'/'.$full_name, File::get( $video ) );

    return $full_name;
}

/*
----------------------------------------------------------------------------------------------------------
HELPER FUNCTION GET UPLOAD ATTACHMENT
----------------------------------------------------------------------------------------------------------
*/

function getUploadVideo( $video, $disk )
 {

    if ( $video ) {
        $filePath = 'video/' .$disk.'/'.  $video;
        $attachmentUrl =  '/uploads/'.$filePath;
        return $attachmentUrl;
    }
    return null;
}
