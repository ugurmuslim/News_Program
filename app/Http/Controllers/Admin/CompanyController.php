<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleType;
use App\Models\Company;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $query = Company::query();
        $companies = $query->paginate();
        return view('admin.Company.index')
            ->with('companies', $companies);
    }

    public function postUpdate($id = null)
    {
        if ($id) {
            $company = Company::find($id);
            if (!$company) {
                abort(404);
            }
            return view('admin.Company.postUpdate')
                ->with("company", $company);
        }

        return view('admin.Company.postUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'Title'    => 'required|string',
            'ArticleTypeId'     => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        $company = new Company();
        if (Request::input('CompanyId')) {
            $company = Company::find(Request::input('CompanyId'));
            if (!$company) {
                abort(404);
            }
        }

        $articleType = ArticleType::find(Request::input('ArticleTypeId'));
        $imageDimensions = json_decode($articleType->image_dimensions, true);
        if (Request::hasFile('image')) {
            $image_parts = explode(";base64,", Request::input('image1'));
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = "images/" . uniqid() . '.webp';

            if (Request::input('PlacementSection')) {
                Image::make($image_base64)->encode('webp', 90)->resize($imageDimensions[Request::input('PlacementSection')]['width'], $imageDimensions[Request::input('PlacementSection')]['height'])->save($file);
            }

            $company->image_path = $file;
        }
        $company->title = Request::input('Title');
        $company->save();

        Session::flash('success', "Başarı ile yaratıldı");
        return back();

    }
}

