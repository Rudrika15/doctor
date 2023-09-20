<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ghanshyamank;
use App\Models\GhanshyamankCategoryList;
use App\Models\GhanshyamankChapter;
use App\Models\GhanshyamankMyFavourite;
use App\Models\GhanshyamankSubtitle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GhanshyamankController extends Controller
{
    //  api -- get -- ghanshyamank/getTopBarCategory/{parentId?}
    public function getTopBarCategory(Request $request)
    {
        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamank_category_details.*', 'ghanshyamank_category_lists.ghanshyamankCategorySlug', 'ghanshyamank_category_lists.ghanshyamankCategoryThumbnail',
                    'ghanshyamank_category_lists.ghanshyamankCategoryNameHin as ghanshyamankCategoryNameEng'
                ];
                break;
            case "guj":
                $fieldList = [
                    'ghanshyamank_category_details.*', 'ghanshyamank_category_lists.ghanshyamankCategorySlug', 'ghanshyamank_category_lists.ghanshyamankCategoryThumbnail',
                    'ghanshyamank_category_lists.ghanshyamankCategoryNameGuj as ghanshyamankCategoryNameEng'
                ];

                break;
            default:
                $fieldList = [
                    'ghanshyamank_category_details.*', 'ghanshyamank_category_lists.ghanshyamankCategorySlug', 'ghanshyamank_category_lists.ghanshyamankCategoryThumbnail',
                    'ghanshyamank_category_lists.ghanshyamankCategoryNameEng as ghanshyamankCategoryNameEng'
                ];
        }

        $ghanshyamankCategory = GhanshyamankCategoryList::orderBy('ghanshyamankCategorySortOrder')
            ->where('ghanshyamankCategoryStatus', '=', 'Y')
            ->get($fieldList);

        $response = [
            'success' => true,
            'message' => "Ghanshyamank Category data",
            'data'    => $ghanshyamankCategory,
        ];

        return response()->json($response, 200);
    }

    // api -- get -- ghanshyamank/{catId?}/{userId?}
    public function Ghanshyamank(Request $request,  $catId = 0, $userId = 0)
    {
        $todayDateTime = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d H:i:s A');
        $todayDate = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d');

        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleHin as ghanshyamankTitleEng'
                ];
                break;
            case "guj":
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleGuj as ghanshyamankTitleEng'
                ];
                break;
            default:
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleEng as ghanshyamankTitleEng'
                ];
        }

        $ghanshyamank = Ghanshyamank::join('ghanshyamank_category_mappings', 'ghanshyamank_category_mappings.ghanshyamankId', '=', 'ghanshyamanks.id')
            ->where('ghanshyamank_category_mappings.ghanshyamankCategoryId', '=', $catId)
            ->where('ghanshyamanks.ghanshyamankStartDateTime', '<=', $todayDateTime)
            ->where('ghanshyamanks.ghanshyamankEndDateTime', '>=', $todayDateTime)
            ->with(['myFavorite' => function ($query) use ($userId) {
                $query->where('userId', '=', $userId);
            }])
            ->orderBy('ghanshyamank_category_mappings.ghanshyamankCategoryMappingSortOrder')
            ->get($fieldList);

        if (count($ghanshyamank) > 0) {
            $response = [
                'status' => true,
                'message' => "Get Ghanshyamank by category",
                "ghanshyamank" => $ghanshyamank

            ];
        } else {
            $response = [
                'status' => true,
                'message' => "Can Not Found Ghanshyamank by category",
                "ghanshyamank" => $ghanshyamank

            ];
        }
        return response()->json($response, 200);
    }


    // api -- get -- ghanshyamank-subtitle/{ghanshyamankId?}
    public function ghanshyamankSubtitle(Request $request, $id = 0)
    {
        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameHin as chapterNameEng'
                ];
                $fieldList1 = [
                    'ghanshyamank_subtitles.*', 'ghanshyamank_subtitles.subtitleNameHin as subtitleNameEng'
                ];
                break;
            case "guj":
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameGuj as chapterNameEng'
                ];
                $fieldList1 = [
                    'ghanshyamank_subtitles.*', 'ghanshyamank_subtitles.subtitleNameGuj as subtitleNameEng'
                ];
                break;
            default:
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameEng as chapterNameEng'
                ];
                $fieldList1 = [
                    'ghanshyamank_subtitles.*', 'ghanshyamank_subtitles.subtitleNameEng as subtitleNameEng'
                ];
        }

        $check = Ghanshyamank::where('id', '=', $id)->first();
        $subTitle = $check->ghanshyamankIsSubtitle;
        if ($subTitle == "Y") {
            $ghanshyamankChapter = GhanshyamankSubtitle::where('subtitleGhanshyamankId', '=', $id)
                ->where('subtitleStatus', '=', 'Y')
                ->orderBy('subtitleSortOrder')
                ->get($fieldList1);
        } else {
            $ghanshyamankChapter = GhanshyamankChapter::where('chapterGhanshyamankId', '=', $id)
                ->where('chapterStatus', '=', 'Y')
                ->orderBy('chapterSortOrder')
                ->get($fieldList);
        }
        $response = [
            'status' => true,
            'message' => "Get chapter by Ghanshyamank",
            "subtitle" => $subTitle,
            "ghanshyamank" => $ghanshyamankChapter
        ];

        return response()->json($response, 200);
    }

    // api -- get -- ghanshyamank/subtitle/chapter/{ghanshyamankId?}/{subtitleId?}
    public function ghanshyamankChapter(Request $request, $ghanshyamankId = 0, $subtitleId = 0)
    {
        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameHin as chapterNameEng'
                ];
                break;

            case "guj":
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameGuj as chapterNameEng'
                ];
                break;

            default:
                $fieldList = [
                    'ghanshyamank_chapters.*', 'ghanshyamank_chapters.chapterNameEng as chapterNameEng'
                ];
        }

        $ghanshyamankChapter = GhanshyamankChapter::where('chapterGhanshyamankId', '=', $ghanshyamankId)
            ->where('chapterSubtitleId', '=', $subtitleId)
            ->where('chapterStatus', '=', 'Y')
            ->orderBy('chapterSortOrder')
            ->get($fieldList);

        if (count($ghanshyamankChapter) > 0) {
            $response = [
                'status' => true,
                'message' => "Get chapter by Subtitle",
                "ghanshyamank" => $ghanshyamankChapter
            ];
        } else {
            $response = [
                'status' => true,
                'message' => "Can Not Get chapter by Subtitle",
                "ghanshyamank" => $ghanshyamankChapter
            ];
        }


        return response()->json($response, 200);
    }

    // api -- get -- ghanshyamankAll/{userId?}
    public function ghanshyamankAll(Request $request, $userId = 0)
    {
        $todayDateTime = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d H:i:s A');
        $todayDate = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d');

        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleHin as ghanshyamankTitleEng'
                ];
                break;
            case "guj":
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleGuj as ghanshyamankTitleEng'
                ];
                break;
            default:
                $fieldList = [
                    'ghanshyamanks.*', 'ghanshyamanks.ghanshyamankTitleEng as ghanshyamankTitleEng'
                ];
        }

        $ghanshyamank = Ghanshyamank::with([
            'myFavorite' => fn ($query) =>
            $query->where('userId', '=', $userId)
        ])
            ->where('ghanshyamankStartDateTime', '<=', $todayDateTime)
            ->where('ghanshyamankEndDateTime', '>=', $todayDateTime)
            ->orderBy('id', 'desc')
            // ->withCount('myFavorite')
            ->get();

        $response = [
            'status' => true,
            'message' => "Get All Ghanshyamank",
            "ghanshyamank" => $ghanshyamank
        ];

        return response()->json($response, 200);
    }

    // api -- get -- library/favghanshyamank
    public function favouriteGhanshyamank(Request $request, $userId = 0)
    {
        switch ($request->languageKeyword) {
            case "hin":
                $fieldList = [
                    'ghanshyamanks.*',
                    'ghanshyamanks.ghanshyamankTitleHin as ghanshyamankTitleEng'
                ];
                break;

            case "guj":
                $fieldList = [
                    'ghanshyamanks.*',
                    'ghanshyamanks.ghanshyamankTitleGuj as ghanshyamankTitleEng'
                ];
                break;

            default:
                $fieldList = [
                    'ghanshyamanks.*',
                    'ghanshyamanks.ghanshyamankTitleEng as ghanshyamankTitleEng'
                ];
        }

        $todayDateTime = Carbon::now()->tz('Asia/Kolkata')->format('Y-m-d H:i:s A');


        // by category 
        $ghanshyamank = Ghanshyamank::where('ghanshyamankStartDateTime', '<=', $todayDateTime)
            ->where('ghanshyamankEndDateTime', '>=', $todayDateTime)
            ->where('ghanshyamankStatus', '=', 'Y')
            ->with(['myFavorite' => fn ($query) => $query->where('userId', '=', $userId)])
            ->whereHas(
                'myFavorite',
                fn ($query) =>
                $query->where('userId', '=', $userId)
            )
            ->get($fieldList);


        $response = [
            'status' => true,
            'message' => "Get My Favourite Ghanshyamank",
            "ghanshyamank" => $ghanshyamank
        ];

        return response()->json($response, 200);
    }
}
