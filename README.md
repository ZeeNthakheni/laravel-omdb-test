# Laravel OMDB Site

Built on Laravel 11 and PHP. Basic starter template. Contributors are welcome!

Here are some steps for getting started. Please note that these steps are with the assumption that you have a database server/service installed and running.

Before you start. You will need the following

## First Get your https://www.omdbapi.com/ api key, follow these instructions

To use the OMDB API in this project, you'll need to obtain an API key. Follow these steps to get your key:

1. **Visit the OMDB Website**:
   Go to the OMDB API website.

2. **Sign Up**:
   Click on the "API Key" link in the navigation bar. You will be redirected to a sign-up page.

3. **Fill Out the Form**:
   Complete the registration form with your details. Make sure to provide a valid email address as the API key will be sent to you via email.

4. **Confirm Your Email**:
   After submitting the form, check your email for a confirmation message from OMDB. Click on the confirmation link to verify your email address.

5. **Receive Your API Key**:
   Once your email is confirmed, you will receive another email containing your API key.

6. **Add Your API Key to the Project**:
   - Open your `.env` file.
   - Add your OMDB API key to the file:
     ```env
     OMDB_API_KEY="your_api_key_here"
     ```

## Secondly get a https://www.themoviedb.org/ API Key

To use the TMDB API in this project, you'll need to obtain an API key. Follow these steps to get your key:

1. **Visit the TMDB Website**:
   Go to the TMDB website.

2. **Create an Account**:
   If you don't already have an account, click on "Sign Up" in the top right corner and complete the registration process. If you already have an account, simply log in.

3. **Navigate to API Section**:
   Once logged in, click on your profile icon in the top right corner and select "Settings" from the dropdown menu. Then, navigate to the "API" section on the left sidebar.

4. **Request an API Key**:
   In the API section, click on the "Create" button to request a new API key. You will need to provide some basic information about your application and agree to the terms of use.

5. **Fill Out the Application Form**:
   Complete the form with the required details about your application. Be sure to provide accurate information to avoid any issues with your API key request.

6. **Submit the Form**:
   After filling out the form, submit it. Your API key will be generated and displayed on the screen. Make sure to copy it and store it securely.

7. **Add Your API Key to the Project**:
   - Open your `.env` file.
   - Add your TMDB API key to the file:
     ```env
     TMDB_API_KEY="your_api_key_here"
     ```


## To Use the Site

1. Download and unzip the REPO or clone it here 'https://github.com/ZeeNthakheni/laravel-omdb-test.git'
2. Spin up your SQL server and create a new database.
3. Copy the `.env.example` to `.env`.
4. Enter your database details in the `.env` file, including the `TMDB_API_KEY` and `OMDB_API_KEY`.
5. Navigate to the unzipped folder. Alternatively, you can open a terminal in the folder.
6. Run 'composer install'
7. Run `php artisan migrate`.
8. Run `php artisan serve`.
9. Run `php artisan test`.
10. Open a new terminal in the folder location and run `npm run dev`.
11. You should now be able to access your site on 127.0.0.1:8000.

That's it!

## Instructions to Use

1. After spinning up the site, register a user account and log in.
2. Once logged in, you will find yourself on the home page.
3. To search for movies, enter the title name in the input field and click on the search button.
4. To view a movie's information, simply click on the link to go to the movie's details page.
5. To view a list of trending movies, click on the "Trending" navigation tab. You will see a list of the top 20 movies trending this week.
6. To view a movie's information, simply click on the link to go to the movie's details page.

## Site endpoints

*All endpoints require you be an authenticated user to work

1. '/trending' get request to view trending movies
2. '/movie/{id}' get request to view a movie's details

## Livewire components

1. Search Movie Component
   The component's function is to accept a search term then through a http call, retrieve a list of movies matching that search term.
   There remains room for improvement as I would like to improve the movie list formatting and implement a pagination feature.

2. Trending Movies component
   This component's function is to retrieve and display a list of the 20 currently trending movies. The http call is performed during the mount cycle, that way the list is ready as soon as the component is.
   As an area of improvement, I would like to refine the formatting of the list and also implement a pagination.

## Project Assumptions 

1. I utilized the breeze starter kit largely so I could get a running start on the project, but I would like to leverage the authentication layer, for features like watchlists.
2. The OMDB api has no endpoint for popular movies, so to get around the issue, I leveraged the TMDB api to grab a list of trending movies. This allowed me to meet the project requirement in a much more timely manner.
   

!!!Important Note!!! Everytime you run the unit tests they WILL wipe your database. Please be very careful with this.

