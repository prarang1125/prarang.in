@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')

<div class="container my-5">
    <h2 class="text-center mb-4">Manage VCard</h2>

    <!-- Card Form -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Choose Color -->
                        <div class="mb-3">
                            <label for="color_code" class="form-label">Choose Color</label>
                            <input type="color" class="form-control form-control-color" id="color_code" name="color_code" value="#007bff">
                        </div>

                        <!-- Upload Banner -->
                        <div class="mb-3">
                            <label for="banner" class="form-label">Upload Banner</label>
                            <input type="file" class="form-control" id="banner" name="banner">
                        </div>

                        <!-- Upload Logo -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">Upload Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter unique slug value">
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save VCard</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- View Icon -->
            <div class="text-center mt-3">
                <a href="#" target="_blank" title="View VCard">
                    <i class='bx bx-show' style="font-size: 30px; color: #007bff; cursor: pointer;"></i>
                </a>
            </div>
        </div>
    </div>
</div>
