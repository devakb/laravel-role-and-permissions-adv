<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@config('app.name')</title>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

      <style>
          :root{--color-white:#ffffff;--color-light:#f1f5f9;--color-black:#121212;--color-night:#001632;--color-red:#f44336;--color-blue:#1a73e8;--color-gray:#80868b;--color-grayish:#dadce0;--shadow-normal:0 1px 3px 0 rgba(0, 0, 0, 0.1),0 1px 2px 0 rgba(0, 0, 0, 0.06);--shadow-medium:0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);--shadow-large:0 10px 15px -3px rgba(0, 0, 0, 0.1),0 4px 6px -2px rgba(0, 0, 0, 0.05)}html{font-size:100%;font-size-adjust:100%;box-sizing:border-box;scroll-behavior:smooth}*,::after,::before{padding:0;margin:0;box-sizing:inherit;list-style:none;list-style-type:none;text-decoration:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility}body{font-family:"Segoe UI",Tahoma,Geneva,Verdana,sans-serif;font-size:1rem;font-weight:400;line-height:1.5;color:var(--color-black);background:var(--color-light)}a,button{font-family:inherit;font-size:inherit;line-height:inherit;cursor:pointer;border:none;outline:0;background:0 0;text-decoration:none}img{display:block;width:100%;height:auto;-o-object-fit:cover;object-fit:cover}.container{display:flex;justify-content:center;align-items:center;max-width:80rem;min-height:100vh;width:100%;padding:0 2rem;margin:0 auto}.ion-logo-apple{font-size:1.65rem;line-height:inherit;margin-right:.5rem;color:var(--color-black)}.ion-logo-google{font-size:1.65rem;line-height:inherit;margin-right:.5rem;color:var(--color-red)}.ion-logo-facebook{font-size:1.65rem;line-height:inherit;margin-right:.5rem;color:var(--color-blue)}.text{font-family:inherit;line-height:inherit;text-transform:unset;text-rendering:optimizeLegibility}.text-large{font-size:2rem;font-weight:600;color:var(--color-black)}.text-normal{font-size:1rem;font-weight:400;color:var(--color-black)}.text-links{font-size:1rem;font-weight:400;color:var(--color-blue)}.text-links:hover{text-decoration:underline}.main .wrapper{max-width:28rem;width:100%;margin:2rem auto;padding:2rem 2.5rem;border:none;outline:0;border-radius:.25rem;color:var(--color-black);background:var(--color-white);box-shadow:var(--shadow-large)}.main .wrapper .form{width:100%;height:auto;margin-top:2rem}.main .wrapper .form .input-control{display:flex;align-items:center;justify-content:space-between;margin:0}.main .wrapper .form .input-field{font-family:inherit;font-size:1rem;font-weight:400;line-height:inherit;width:100%;height:auto;padding:.75rem 1.25rem;border:none;outline:0;border-radius:2rem;color:var(--color-black);background:var(--color-light);text-transform:unset;text-rendering:optimizeLegibility}.main .wrapper .form .input-submit{font-family:inherit;font-size:1rem;font-weight:500;line-height:inherit;cursor:pointer;min-width:40%;height:auto;padding:.65rem 1.25rem;border:none;outline:0;border-radius:2rem;color:var(--color-white);background:var(--color-blue);box-shadow:var(--shadow-medium);text-transform:capitalize;text-rendering:optimizeLegibility}.main .wrapper .striped{display:flex;flex-direction:row;justify-content:center;align-items:center;margin:1rem 0}.main .wrapper .striped-line{flex:auto;flex-basis:auto;border:none;outline:0;height:2px;background:var(--color-grayish)}.main .wrapper .striped-text{font-family:inherit;font-size:1rem;font-weight:500;line-height:inherit;color:var(--color-black);margin:0 1rem}.main .wrapper .method-control{margin-bottom:1rem}.main .wrapper .method-action{font-family:inherit;font-size:.95rem;font-weight:500;line-height:inherit;display:flex;justify-content:center;align-items:center;width:100%;height:auto;padding:.5rem 1.25rem;outline:0;border:2px solid var(--color-grayish);border-radius:2rem;color:var(--color-black);background:var(--color-white);text-transform:capitalize;text-rendering:optimizeLegibility;transition:all .35s ease}.main .wrapper .method-action:hover{background:var(--color-light)}.text-info{color:#06bcbc;}.input-error{color: rgb(255, 0, 0);font-size:small; padding-left:8px; margin: 5px 0; display:block;}
      </style>
   </head>
   <body>
    <main class="main">
        <div class="container">
            <section class="wrapper">
                <h3><a href="@config('app.url')" class="text-info">@config('app.name')</a></h3>
                @yield('content')
            </section>
        </div>
    </main>
   </body>
</html>
