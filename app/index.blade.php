@extends('layouts.app')
@section('header', 'Ghanshyamank')
@section('content')

    {{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script> --}}

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="card shadow-sm  bg-body rounded">
            <div class="card-header ">
                <div class="row">
                    <div class="col">
                        <h6>Ghanshyamank Management</h6>
                    </div>
                    <div class="col" align="right">
                        <a class="btn btn-primary" href="{{ route('ghanshyamank.create') }}">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="loader"></div>
                {{-- search code here --}}
                <form action="">
                    <div class="border" style="padding: 5px;">
                        <div class="row mt-3">
                            <div class="col-lg col-sm-12 mt-2">
                                <input type="text" class="form-control" name="ghanshyamankTitle" id=""
                                    placeholder="Enter ghanshyamank Title" value="{{ $ghanshyamankTitle }}">
                            </div>

                            <div class="col-lg col-sm-12 mt-2">
                                <select class="searchTextBox searchDDCategory" aria-label="Default select example"
                                    name="ghanshyamankCategorySearch">
                                    <option value="" selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        @if (count($category->childData) == 0)
                                            <option value="{{ $category->id }}"
                                                @if ($ghanshyamankCategorySearch == $category->id) selected='selected' @endif>
                                                {{ $category->ghanshyamankCategoryNameEng }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <p id="searchCategoryResult"></p>
                            </div>

                            <div class="col-lg col-sm-12 mt-2">
                                <select class="form-select" aria-label="Default select example" name="ghanshyamankStatus">
                                    <option value="" selected>-- Select Publish category --</option>
                                    <option value="Y" {{ $ghanshyamankStatus == 'Y' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="N" {{ $ghanshyamankStatus == 'N' ? 'selected' : '' }}>No
                                    </option>
                                    <option value="D" {{ $ghanshyamankStatus == 'D' ? 'selected' : '' }}>Delete
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg col-sm-6 col-md-6 mt-2">
                                <label for="">Start Date</label>
                                <input type="Date" class="form-control" name="ghanshyamankStartDateTime" id=""
                                    placeholder="Publish Date" value="{{ $ghanshyamankStartDateTime }}">
                            </div>
                            <div class="col-lg col-sm-6 col-md-6 mt-2">
                                <label for="">End Date</label>
                                <input type="Date" class="form-control" name="ghanshyamankEndDateTime" id=""
                                    placeholder="End Date" value="{{ $ghanshyamankEndDateTime }}">
                            </div>
                        </div>

                        <a href="{{ route('ghanshyamank.index') }}" class="btn btn-secondary mt-2 mb-3">Clear</a>
                        <button class="btn btn-primary mt-2 mb-3">Search</button>
                    </div>
                </form>

                {{-- Table start --}}
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Ghanshyamank Name</th>
                        <th>Category</th>
                        <th>SortOrder</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Is SubTitle</th>
                        <th>Is Published</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @if (count($ghanshyamank) > 0)
                        @foreach ($ghanshyamank as $key => $ghanshyamankData)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img class="mt-2" src="{{ url('smvsimages/ghanshyamankmodule/ghanshyamankimage/' . $ghanshyamankData->ghanshyamankImage) }}"
                                        accept="" height="100px" class="img"></td>
                                <td>{{ $ghanshyamankData->ghanshyamankTitleEng }}<br>
                                    {{ $ghanshyamankData->ghanshyamankTitleGuj }}<br>
                                    {{ $ghanshyamankData->ghanshyamankTitleHin }}<br>
                                </td>
                                {{-- category name display --}}
                                <td>
                                    <ul>
                                        @foreach ($ghanshyamankData->child as $child)
                                            @foreach ($categories as $category1)
                                                @if ($child->ghanshyamankCategoryId == $category1->id)
                                                    <li>{{ $category1->ghanshyamankCategoryNameEng }}</li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </td>

                                {{-- sortorder --}}
                                <td>
                                    <ul>
                                        @foreach ($ghanshyamankData->child as $child1)
                                            <li>{{ $child1->ghanshyamankCategoryMappingSortOrder }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td>{{ $ghanshyamankData->ghanshyamankStartDateTime }}</td>
                                <td>{{ $ghanshyamankData->ghanshyamankEndDateTime }}</td>
                                <td>
                                    @if ($ghanshyamankData->ghanshyamankIsSubtitle == 'Y')
                                        Yes
                                    @endif
                                    @if ($ghanshyamankData->ghanshyamankIsSubtitle == 'N')
                                        No
                                    @endif

                                </td>
                                <td>
                                    @if ($ghanshyamankData->ghanshyamankStatus == 'Y')
                                        Yes
                                    @endif
                                    @if ($ghanshyamankData->ghanshyamankStatus == 'D')
                                        Delete
                                    @endif
                                    @if ($ghanshyamankData->ghanshyamankStatus == 'N')
                                        No
                                    @endif

                                </td>
                                <td>
                                    <a class="" href="{{ route('ghanshyamank.edit') }}/{{ $ghanshyamankData->id }}"><i
                                            class="bi bi-pencil-square text-primary fs-4"></i>
                                    </a><br>
                                    @if ($ghanshyamankData->ghanshyamankIsSubtitle == 'Y')
                                        <a class="text-success fs-6 fw-bold"
                                            href="{{ route('ghanshyamank-subtitle.index') }}/{{ $ghanshyamankData->id }}">Section Entry
                                        </a><br>
                                        <a class="text-danger fs-6 fw-bold"
                                            href="{{ route('ghanshyamank-chapter.index') }}/{{ $ghanshyamankData->id }}">Chapter Entry
                                        </a>
                                    @else
                                        <a class="text-danger fs-6 fw-bold"
                                            href="{{ route('ghanshyamank-chapter.index') }}/{{ $ghanshyamankData->id }}">Chapter Entry
                                        </a>
                                    @endif


                                    {{-- <a class=""
                                    href="{{ route('ghanshyamank.delete') }}/{{ $ghanshyamankData->id }}"
                                    onclick="return confirm('{{ __('Are you sure you want to delete?') }}')"><i
                                        class="bi bi-trash3-fill text-danger fs-4"></i></a>
                                <br> --}}
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" align="center" style="color: red;">
                                <h5>No Data Record Found</h5>
                            </td>
                        </tr>
                    @endif

                </table>

                {{-- table end --}}
                {{ $ghanshyamank->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>


@endsection
