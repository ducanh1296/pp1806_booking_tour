<?php
namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTourRequest;
use App\Http\Requests\UpdateTourRequest;

class TourController extends Controller
{   
    public function index(Request $request) {
        $tours = Tour::paginate(config('tours.paginate'));

        return view('tours.index', ['tours' => $tours]);
    }

    public function create() {
        return view('tours.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTourRequest $request) {
        $data = $request->only([
            'category_id',
            'discount',
            'tour_name',
            'start',
            'price',
            'image',
            'quantity',
            'avg_rating',
            'description',
            'created_by',
            'days',
        ]);
        $uploaded = $this->upload($data['image']);
        
        if (!$uploaded['status']) {
            return back()->with('status', $uploaded['msg']);
        }
        $data['image'] = $uploaded['file_name'];
        
        try {
            $tour = Tour::create($data);
        } catch (Exception $e) {
            return back()->with('status', 'Create fail!');
        }
        
        return redirect('tours/' . $tour->id)->with('status', 'Create success!');
    }

    private function upload($file) {
        $destinationFolder = public_path() . '/' . config('tours.image_path');
        
        try {
            $fileName = date('Ymd_His') . '_' . $file->getClientOriginalName();
            $imageFileType = $file->getClientOriginalExtension();
            
            if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' ) {
                $result = [
                    'status' => false,
                    'msg' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.',
                ];
            }
            // $mimeType = $file->getMimeType();
            // $realPath = $file->getRealPath();
            $file->move($destinationFolder, $fileName);
                
            $result = [
                'status' => true,
                'file_name' => $fileName,
            ];
        } catch (Exception $e) {
            $msg = $e->getMessage();
                
            $result = [
                'status' => false,
                'msg' => $msg,
            ];
        }

        return $result;
    }

    public function show($id) {
        $tour = Tour::findOrFail($id);

        return view('tours.show', ['tour' => $tour]);
    }

    public function edit($id) {
        $tour = Tour::find($id);
        
        if (!$tour) {
            return back();
        }
        
        return view('tours.edit', ['tour' => $tour]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourRequest $request, $id) {
        $data = $request->only([
            'category_id',
            'discount',
            'tour_name',
            'start',
            'price',
            'image',
            'quantity',
            'avg_rating',
            'description',
            'created_by',
            'days',
        ]);
        
        try {
            $tour = Tour::find($id);
            $tour->update($data);
        } catch (Exception $e) {
            return back()->with('status', trans('message.update_fail'));
        }
        
        return redirect('products/' . $id)->with('status', trans('message.update_success'));
    }

    public function destroy($id) {
        try {
            $tour = Tour::find($id);
            $tour->delete();
            $result = [
                'status' => true,
                'msg' => trans('message.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => trans('message.delete_fail'),
            ];
        }
        
        return response()->json($result);
    }
}
