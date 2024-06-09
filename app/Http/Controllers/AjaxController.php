<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tour;
use App\Models\GuideLanguageMap;
use App\Models\Guide;
use App\Models\Vehical;
use App\Models\HotelCityMap;
use App\Models\Hotel;
use App\Models\HotelRoomTypeMap;
use App\Models\RoomCategory;
use App\Models\TourSchedule;

class AjaxController extends Controller
{
    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOURS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTours(Request $request)
    {
        $query = Tour::with('countryDetails','agentDetails','statusDetails');

        // filter
        $year_filter = $request->columns[1]['search']['value'];
        $month_filter = $request->columns[2]['search']['value'];
        // $status = $request->columns[7]['search']['value'];
        // return response()->json($task_category_filter);
        // $project_filter = $request->columns[0]['search']['value'];
        // $task_category_filter = $request->columns[3]['search']['value'];
        // $status = $request->columns[7]['search']['value'];
        // return response()->json($project_filter);
        // $user_name_filter = $request->columns[0]['search']['value'];
        // filter

        // ordering
        $column_index = $request->order[0]['column'];
        $order_dir = $request->order[0]['dir'];
        $columns = $request->columns;
        $column_name = $columns[$column_index]['data'];

        if ($column_name == 'tour_number') {
            $column_name = 'id';
        }

        $query = $query->orderBy($column_name, $order_dir);

        // ordering end

        // // filter query
        if($year_filter == null){
            $query->whereYear('arrivel_date', Carbon::now()->year);
        }
        if($month_filter == null){
            $query->whereMonth('arrivel_date', Carbon::now()->month);
        }

        if($year_filter != null){
            $query->whereYear('arrivel_date', $year_filter);
        }

        if($month_filter != null){
            $query->whereMonth('arrivel_date', $month_filter);
        }

        // if($task_category_filter != null){
        //     $query->where('task_category_id', $task_category_filter);
        // }
        // if($status != null){
        //     if($status == 1){
        //         $query->where('status', 1);
        //         $query->orWhere('status', 2);
        //         $query->orWhere('status', 3);
        //     }else if($status == 2){
        //         $query->where('status', 4);
        //     }else if($status == 3){
        //         $query->where('status', 5);
        //         $query->orWhere('status', 6);
        //         $query->orWhere('status', 7);
        //     }else if($status == 4){
        //         $query->where('status', 8);
        //         $query->orWhere('status', 9);
        //     }else if($status == 5){
        //         $query->where('status', 10);
        //     }
        // }
        // filter query

        if ($request->has('search') && $request->search['value'] != null) {
            $search_value = $request->search['value'];
            $query = $query->where(function ($data) use ($search_value) {
                $data->orWhere('id', 'like', '%' . $search_value . '%')
                    ->orWhere('tour_number', 'like', '%' . $search_value . '%')
                    ->orWhere('guest_name', 'like', '%' . $search_value . '%')
                    ->orWhere('no_of_visiter', 'like', '%' . $search_value . '%')
                    ->orWhere('arrivel_date', 'like', '%' . $search_value . '%')
                    ->orWhere('departure_date', 'like', '%' . $search_value . '%')
                    ->orWhereHas('countryDetails', function ($data) use ($search_value) {
                        $data->where('country_name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('agentDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('statusDetails', function ($data) use ($search_value) {
                        $data->where('title', 'like', '%' . $search_value . '%');
                    });
            });
        }

        $page = ($request->start / $request->length);
        $request->merge(['page' => $page]);
        if ($request->length != -1) {
            $query = $query->paginate($request->length);
        } else {
            $query = $query->paginate($query->count());
        }

        foreach ($query as $key => $value) {

            $query[$key]->status_badge = '<span class="badge badge-' . $value->statusDetails->class . '">' .$value->statusDetails->title. '</span>';

            $action =  '<div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>';

            if($value->status == 1 ){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">
                                <a class="dropdown-item" href="/tour-status/'.$value->id.'/2">Confirm</a>
                                <a class="dropdown-item" href="/tour-status/'.$value->id.'/3">Cancel</a>
                                <a target="_blank" class="dropdown-item" href="/edit-tour/'.$value->id.'">Edit</a>
                            </div>';
            }else if($value->status == 2){
                $action .= '<div class="dropdown-menu btn-xs" role="menu">
                                <a target="_blank" class="dropdown-item" href="/edit-tour/'.$value->id.'">Edit</a>
                                <a class="dropdown-item" href="/tour-status/'.$value->id.'/3">Cancel</a>
                                <a target="_blank" class="dropdown-item" href="/view-tour-schedule/' . $value->id . '">Tour Schedule</a>
                                <a class="dropdown-item" href="/tour-status/'.$value->id.'/4">Complete</a>
                            </div>';
            }else if($value->status == 3){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">
                                <a class="dropdown-item" href="/tour-status/'.$value->id.'/2">Confirm</a>
                                <a target="_blank" class="dropdown-item" href="/edit-tour/'.$value->id.'">Edit</a>
                            </div>';
            }
            else if($value->status == 4){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">
                                <a class="dropdown-item" href="/view-tour-schedule/'.$value->id.'">Tour Schedule</a>
                            </div>';
            }
            $action .= '</div>';
            if($value->status == 4){
                $query[$key]->confirmation_pdf = '<a target="_Blank" href="/view-confirmation-voucher/'.$value->id.'" class="btn btn-xs btn-primary">Download</a>';
            }else{
                $query[$key]->confirmation_pdf = '<span class="badge badge-warning">Pending</span>';
            }
            $query[$key]->action = $action;
        }

        $paginated_list = json_decode(json_encode($query));
        $query = $query->map(function ($query) {
            return $query;
        })->all();

        $response['draw'] = $request->draw;
        $response['recordsFiltered'] = $paginated_list->total;
        $response['recordsTotal'] = $paginated_list->total;
        $response['data'] = $query;

        return response()->json($response);
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOURS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getToursForTransport(Request $request)
    {
        $query = Tour::with('countryDetails','agentDetails','statusDetails')->whereIn('status',[2,4]);

        // filter
        // $project_filter = $request->columns[0]['search']['value'];
        // $task_category_filter = $request->columns[3]['search']['value'];
        // $status = $request->columns[7]['search']['value'];
        // return response()->json($project_filter);
        // $user_name_filter = $request->columns[0]['search']['value'];
        // filter

        // ordering
        $column_index = $request->order[0]['column'];
        $order_dir = $request->order[0]['dir'];
        $columns = $request->columns;
        $column_name = $columns[$column_index]['data'];

        if ($column_name == 'tour_number') {
            $column_name = 'id';
        }

        $query = $query->orderBy($column_name, $order_dir);

        // ordering end

        // // filter query
        // if($project_filter != null){
        //     $query->where('project_id', $project_filter);
        // }

        // if($task_category_filter != null){
        //     $query->where('task_category_id', $task_category_filter);
        // }
        // if($status != null){
        //     if($status == 1){
        //         $query->where('status', 1);
        //         $query->orWhere('status', 2);
        //         $query->orWhere('status', 3);
        //     }else if($status == 2){
        //         $query->where('status', 4);
        //     }else if($status == 3){
        //         $query->where('status', 5);
        //         $query->orWhere('status', 6);
        //         $query->orWhere('status', 7);
        //     }else if($status == 4){
        //         $query->where('status', 8);
        //         $query->orWhere('status', 9);
        //     }else if($status == 5){
        //         $query->where('status', 10);
        //     }
        // }
        // filter query

        if ($request->has('search') && $request->search['value'] != null) {
            $search_value = $request->search['value'];
            $query = $query->where(function ($data) use ($search_value) {
                $data->orWhere('id', 'like', '%' . $search_value . '%')
                    ->orWhere('tour_number', 'like', '%' . $search_value . '%')
                    ->orWhere('guest_name', 'like', '%' . $search_value . '%')
                    ->orWhere('no_of_visiter', 'like', '%' . $search_value . '%')
                    ->orWhere('arrivel_date', 'like', '%' . $search_value . '%')
                    ->orWhere('departure_date', 'like', '%' . $search_value . '%')
                    ->orWhereHas('countryDetails', function ($data) use ($search_value) {
                        $data->where('country_name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('agentDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('statusDetails', function ($data) use ($search_value) {
                        $data->where('title', 'like', '%' . $search_value . '%');
                    });
            });
        }

        $page = ($request->start / $request->length);
        $request->merge(['page' => $page]);
        if ($request->length != -1) {
            $query = $query->paginate($request->length);
        } else {
            $query = $query->paginate($query->count());
        }

        foreach ($query as $key => $value) {

            $query[$key]->status_badge = '<span class="badge badge-' . $value->statusDetails->class . '">' .$value->statusDetails->title. '</span>';

            $has_tour_schedule = TourSchedule::where('tour_id',$value->id)->first();

            if($has_tour_schedule->guide){
                $query[$key]->is_assign = '<span class="badge badge-success">Assigned</span>';
            }else{
                $query[$key]->is_assign = '<span class="badge badge-warning">Not Assigned</span>';
            }

            $action =  '<div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>';

            if($value->status == 2){
                $action .=  '<div class="dropdown-menu btn-xs"  role="menu">';
                if(!$has_tour_schedule->guide){
                    $action .= '<a target="_blank" class="dropdown-item" href="/assign-franchise-from-transport/'.$value->id.'">Assign</a>';
                }
                $action .=      '<a target="_blank" class="dropdown-item" href="/view-tour-schedule-for-transpotaion/'.$value->id.'">Tour Schedule</a>
                            </div>';
            }
            else if($value->status == 4){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">
                                <a class="dropdown-item" href="/view-tour-schedule-for-transpotaion/'.$value->id.'">Tour Schedule</a>
                            </div>';
            }
            $action .= '</div>';
            $query[$key]->action = $action;
        }

        $paginated_list = json_decode(json_encode($query));
        $query = $query->map(function ($query) {
            return $query;
        })->all();

        $response['draw'] = $request->draw;
        $response['recordsFiltered'] = $paginated_list->total;
        $response['recordsTotal'] = $paginated_list->total;
        $response['data'] = $query;

        return response()->json($response);
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TOURS FOR HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getToursForHotel(Request $request)
    {
        $query = Tour::with('countryDetails','agentDetails','statusDetails')->whereIn('status',[2,4]);

        // filter
        // $project_filter = $request->columns[0]['search']['value'];
        // $task_category_filter = $request->columns[3]['search']['value'];
        // $status = $request->columns[7]['search']['value'];
        // return response()->json($project_filter);
        // $user_name_filter = $request->columns[0]['search']['value'];
        // filter

        // ordering
        $column_index = $request->order[0]['column'];
        $order_dir = $request->order[0]['dir'];
        $columns = $request->columns;
        $column_name = $columns[$column_index]['data'];

        if ($column_name == 'tour_number') {
            $column_name = 'id';
        }

        $query = $query->orderBy($column_name, $order_dir);

        // ordering end

        // // filter query
        // if($project_filter != null){
        //     $query->where('project_id', $project_filter);
        // }

        // if($task_category_filter != null){
        //     $query->where('task_category_id', $task_category_filter);
        // }
        // if($status != null){
        //     if($status == 1){
        //         $query->where('status', 1);
        //         $query->orWhere('status', 2);
        //         $query->orWhere('status', 3);
        //     }else if($status == 2){
        //         $query->where('status', 4);
        //     }else if($status == 3){
        //         $query->where('status', 5);
        //         $query->orWhere('status', 6);
        //         $query->orWhere('status', 7);
        //     }else if($status == 4){
        //         $query->where('status', 8);
        //         $query->orWhere('status', 9);
        //     }else if($status == 5){
        //         $query->where('status', 10);
        //     }
        // }
        // filter query

        if ($request->has('search') && $request->search['value'] != null) {
            $search_value = $request->search['value'];
            $query = $query->where(function ($data) use ($search_value) {
                $data->orWhere('id', 'like', '%' . $search_value . '%')
                    ->orWhere('tour_number', 'like', '%' . $search_value . '%')
                    ->orWhere('guest_name', 'like', '%' . $search_value . '%')
                    ->orWhere('no_of_visiter', 'like', '%' . $search_value . '%')
                    ->orWhere('arrivel_date', 'like', '%' . $search_value . '%')
                    ->orWhere('departure_date', 'like', '%' . $search_value . '%')
                    ->orWhereHas('countryDetails', function ($data) use ($search_value) {
                        $data->where('country_name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('agentDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('statusDetails', function ($data) use ($search_value) {
                        $data->where('title', 'like', '%' . $search_value . '%');
                    });
            });
        }

        $page = ($request->start / $request->length);
        $request->merge(['page' => $page]);
        if ($request->length != -1) {
            $query = $query->paginate($request->length);
        } else {
            $query = $query->paginate($query->count());
        }

        foreach ($query as $key => $value) {

            $has_tour_schedules = TourSchedule::with('confirmationDetails')->where('tour_id', $value->id)->get();
            $is_assigned = true;
            $is_confirm = true;

            for ($i=0; $i < count($has_tour_schedules) - 1; $i++) {
                if (!$has_tour_schedules[$i]->hotel) {
                    $is_assigned = false;
                    break;
                }
            }

            for ($i=0; $i < count($has_tour_schedules) - 1; $i++) {
                if (!$has_tour_schedules[$i]->hotel_booking_status == 1) {
                    $is_confirm = false;
                    break;
                }
            }

            if ($is_assigned) {
                $query[$key]->is_assign = '<span class="badge badge-success">Assigned</span>';
            } else {
                $query[$key]->is_assign = '<span class="badge badge-warning">Not Assigned</span>';
            }

            if ($is_assigned) {
                if($is_confirm){
                    $query[$key]->confirmation_voucher = ' <a target="_blank" href="/view-confirmation-voucher/'. $value->id.'"
                    class="btn btn-xs btn-primary">Print</a>';
                }else{
                    $query[$key]->confirmation_voucher = '<span class="badge badge-danger">Not Confirm</span>';
                }

            } else {
                $query[$key]->confirmation_voucher = '<span class="badge badge-warning">Not Assigned</span>';
            }



            $query[$key]->status_badge = '<span class="badge badge-' . $value->statusDetails->class . '">' .$value->statusDetails->title. '</span>';



            $action =  '<div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>';

            if($value->status == 2){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">';
                $action .=      '<a target="_blank" class="dropdown-item" href="/view-tour-schedule-for-hotel-management/'.$value->id.'">Tour Schedule</a>
                            </div>';
            }
            else if($value->status == 4){
                $action .=  '<div class="dropdown-menu btn-xs" role="menu">
                                <a class="dropdown-item" href="/view-tour-schedule-for-hotel-management/'.$value->id.'">Tour Schedule</a>
                            </div>';
            }
            $action .= '</div>';
            $query[$key]->action = $action;
        }

        $paginated_list = json_decode(json_encode($query));
        $query = $query->map(function ($query) {
            return $query;
        })->all();

        $response['draw'] = $request->draw;
        $response['recordsFiltered'] = $paginated_list->total;
        $response['recordsTotal'] = $paginated_list->total;
        $response['data'] = $query;

        return response()->json($response);
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET GUIDE USING LANGUAGE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getGuideForLanguage(Request $request)
    {
        try
        {
            $guideIds = GuideLanguageMap::where('language_id', $request->language_id)
            ->groupBy('guide_id')
            ->pluck('guide_id');

            $guides = Guide::whereIn('id', $guideIds)
                ->where('is_active', 1)
                ->get();

            return response()->json(['success' => true, 'data' => $guides]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'title' => 'error', 'icon' => 'error', 'msg' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET VEHICAL USING TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function getVehicalForType(Request $request)
    {
        try {
            $vehical = Vehical::select('id','vehical_model','vehical_no')
                ->where('vehical_type', $request->type_id)
                ->get();

            return response()->json(['success' => true, 'data' => $vehical]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'title' => 'error', 'icon' => 'error', 'msg' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET HOTEL USING CITY
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotelForCity(Request $request)
    {
        try
        {
            $hotelIds = HotelCityMap::where('city_id', $request->city_id)
            ->pluck('hotel_id');

            $hotels = Hotel::whereIn('id', $hotelIds)
                ->where('is_active', 1)
                ->get();

            return response()->json(['success' => true, 'data' => $hotels]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'title' => 'error', 'icon' => 'error', 'msg' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ROOMS USING HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getRoomsForHotel(Request $request)
    {
        try {
            $room_category_ids = HotelRoomTypeMap::where('hotel_id', $request->hotel_id)->with('categoryDetails')
                ->groupBy('room_category_id')
                ->pluck('room_category_id');

            $room_category = [];
            $room_type = [];

            foreach ($room_category_ids as $key => $value) {
                $room_category[$key] = RoomCategory::find($value);
                $room_type[$key] = HotelRoomTypeMap::where('hotel_id', $request->hotel_id)->where('room_category_id',$value)->with('roomTypeDetails')->get();
            }
            $data['room_category'] = $room_category;
            $data['room_type'] = $room_type;
            // foreach ($room_category_id as $key => $value) {
            //     $room_details[$key] = HotelRoomTypeMap::select('room_type_id','room_category_id')->with('categoryDetails','roomTypeDetails')->where('hotel_id', $request->hotel_id)->where('room_category_id',$value)
            //         ->get();
            // }
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'title' => 'error', 'icon' => 'error', 'msg' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ROOMS USING HOTEL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getHotelsForTourConfirmation(Request $request)
    {
        try {
            $tour_schedule = TourSchedule::select('hotel', DB::raw('MIN(id) as id'), DB::raw('MIN(tour_id) as tour_id'))
                            ->where('tour_id', $request->tour_id)
                            ->groupBy('hotel')
                            ->with('hotelDetails')
                            ->get();

            return response()->json(['success' => true, 'data' => $tour_schedule]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'title' => 'error', 'icon' => 'error', 'msg' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
