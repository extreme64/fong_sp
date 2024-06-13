<!-- about.blade.php -->
@extends('layouts.page') 

@section('title', $title)

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
        
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-1 dark:text-white">
                <div class="p-6">
                        
                    <h1>About Us</h1>
    
                    <h2>Quest to create innovative solutions that make a real difference</h2>

                    <section>
    
                        <p>Team of enthusiasts, club of passionate problem-solvers. 
                            Here,m We are guided by the idea of using technology to craft what others are missing</p>
    
                        <h2>Our Mission</h2>
                    
                        <p>Start from a blank page. With the right technology, tools, and proper 
                            mindset, create what makes the difference.</p>
    
                        <h2>Why ForwardCreating?</h2>
    
                        <p>Passionate about empowering people: Technology should be used to make 
                            people's lives better and more fun. Profits follow naturally</p>
    
                        <h2>Our Team</h2>
    
                        <ul>
                            <li>[Name], CEO: [Short bio] with a passion for technology and innovation.</li>
                            <li>[Name], CTO: [Short bio] with expertise in web and native application development.</li>
                            <li>[Name], Designer: [Short bio] with a creative flair for designing user-friendly interfaces.</li>
                        </ul>
                        
                        <h3>Join Our Tribe</h3>
                        
                        <p>You are passionate about technology and want to contribute, join us.</p>
                    </section>

                    
                    <section>
                        <h3>Collaborate With Us</h3>
                        
                        <p>You have an idea for a tool that can make a difference? Let's 
                            explore ways on hot to bring it to life.</p>
                        
                        <h3>Help Us Shape The Future</h3>
                        
                        <p>Join like-minded individuals who share our passion for creating 
                            innovative solutions that make an impact.</p>
                            
                        <p>Thank you for being part of our journey!</p>
                    </section>
                    <section class="py-6 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-50">
                        <div class="container mx-auto flex flex-col items-center justify-center p-4 space-y-8 md:p-10 lg:space-y-0 lg:flex-row lg:justify-between">
                            <h2 class="no-glob-styles text-3xl font-semibold leading-tight text-center lg:text-left">
                                We can team up? Ideas? Lets hear it!</h2>
                            <a href="/contact" class="px-8 py-3 text-lg font-semibold rounded bg-blue-600 dark:bg-blue-400 text-gray-50 dark:text-gray-900">
                                Contact Us</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
@endsection