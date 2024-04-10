@extends('layouts.auth')
@section('content')
<section class="register-page-wrapper login">
        <div class="container">
          <div class="register-page-parent">
            <div class="position-relative">
              <div
                id="carouselExampleControls"
                class="carousel slide position-unset"
                data-bs-ride="carousel" 
              >
                <div class="carousel-indicators">
                  <button
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide-to="0"
                    class="active"
					aria-current="true"
                    aria-label="Slide 1"
                  ></button>
                  <button
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"
                  ></button>
                  <button
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"
                  ></button>
                </div>
                <div class="carousel-inner img-wrapper">
                  <div class="carousel-item active">
                    <img
                      src="{{ asset('images/login_1.svg') }}"
                      class="d-block w-100"
                      alt="images"
                    />
                  </div>
                  <div class="carousel-item img-wrapper">
                    <img
                      src="{{ asset('images/login_2.svg') }}"
                      class="d-block w-100"
                      alt="images"
                    />
                  </div>
                  <div class="carousel-item img-wrapper">
                    <img
                      src="{{ asset('images/login_3.svg') }}"
                      class="d-block w-100"
                      alt="images"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-wrapper">
              <img src="{{ asset('images/logo.svg') }}" class="logo-img" />
              <div class="title-wrapper">
                <h1>Login</h1>
                <div class="small-bar"></div>
              </div>
              <form
                class="form-field-wrapper"
                method="get"
                id="signin-form"
                action="../staff_manager/staff_manager.html"
              >
                <input type="text" name="username" placeholder="Username" required/>
                
                <div class="password-wrapper position-relative">
                  <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                  /><i class="icon icon-eye"></i>
                </div>
                <div
                  class="forgot-password-wrapper d-flex align-items-center justify-content-between"
                >
                  <div class="checkbox-tick-wrapper d-flex align-items-center">
                    <label class="d-flex align-items-center">
                      <input type="checkbox" value="" />
                      <span class="cr"
                        ><i class="icon icon-tick-white"></i
                      ></span>
                      <p>Remember</p>
                    </label>
                  </div>
                  <a href="#">Forgot password?</a>
                </div>
                <div class="btn-wrap">
                  <button class="login-btn-wrap" id="signin_submit">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      
@endsection