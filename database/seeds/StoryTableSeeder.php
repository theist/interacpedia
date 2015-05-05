<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Interacpedia\Story;

class StoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table( 'stories' )->delete();
        Story::create( [
            'title'   => 'Students Win International Scholarship',
            'published' => Carbon::parse('January 28 2015'),
            'summary' => 'Last January, Carolina Morales, Juan Felipe Gaviria y Carlos Pérez, three students form EAFIT University in Medellín, Colombia, won international scholarships to study their next semester abroad at McGill University in Montreal, Canada.\nThe innovative project developed by this team of students during the second semester of 2014 was chosen by company sponsoring the course projects, NUTRESA, as the best solution to improve the efficiency in their production plants.',
            'image'   => 'images/stories/story-01.png'
        ] );
        Story::create( [
            'title'     => 'Together we can help',
            'published' => Carbon::parse('December 2 2014'),
            'summary'   => 'Let´s work together to improve the lifes of more than 250.000 kids in Colombia that don´t have any chance to go to school due to many factors including overcrowding schools, lack of resources and abuse from their parents that make them work from an early age to help support the household.\nWe brought hope to almost 100.000 kids in 2014, by helping them find the means to go to school and start learning. Our goal with this porject is to benefit as much children as possible, so we can begin to change the future of their families and of our city. ',
            'image'     => 'images/stories/story-02.png'
        ] );
    }
}