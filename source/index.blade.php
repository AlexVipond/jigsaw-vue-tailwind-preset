@extends('_layouts.master')

@section('body')

<div id="app">
  <portal-target name="modals"></portal-target>

  <nav class="absolute z-30 pin-t pin-l pin-r container mx-auto flex items-center py-4 px-8">
    <language-setter
    class="rounded-sm p-1 ml-auto text-gray-200 hover:bg-white hover:text-primary-600"
    options-bg-color="bg-white"
    options-text-color="text-primary-600"
    options-z-index="z-30"
    option-hover-bg-color="hover:bg-primary-200"
    @set-language="setLanguage"
    ></language-setter>
  </nav>

  <header id="landing-page" class="flex relative h-screen min-h-400 flex items-center bg-center bg-no-repeat bg-fixed bg-cover" style="background-image: url({{ $page->landing_page_image }})">
    <div class="absolute z-10 pin-t pin-l w-full h-full bg-true-black-60"></div>

    <div class="relative z-20 container mx-auto px-8 py-16">
      <value-proposition :language="language"></value-proposition>

      <div class="inline-flex flex-col sm:flex-row">
        <a href="https://github.com/AlexVipond/jigsaw-vue-tailwind-preset" target="_blank" rel="noopener">
          <primary-call-to-action
          class="btn-lg btn-grow mb-6 sm:mb-0 sm:mr-6 bg-white text-primary-600"
          :language="language">
          </primary-call-to-action>
        </a>

        <a href="https://github.com/AlexVipond/jigsaw-vue-tailwind-preset#readme" target="_blank" rel="noopener">
          <secondary-call-to-action
          class="btn-lg btn-grow border-2 border-primary-gray-100 text-primary-gray-100"
          :language="language"
          >
          </secondary-call-to-action>
        </a>
      </div>
    </div>
  </header>
</div>

<script src="{{ mix('js/main.js', 'assets/build') }}"></script>

@endsection