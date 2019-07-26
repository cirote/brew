<?php

use App\Models\Lupulo;
use Illuminate\Database\Seeder;

class LupulosTableSeeder extends Seeder
{
    public function run()
    {
        Lupulo::create([
        	'variedad' => 'Magnum',
	        'aa' => 15
        ]);

        $ca = Lupulo::create([
            'variedad' => 'Cascade',
            'aa' => 7
        ]);

        $br = Lupulo::create([
            'variedad' => 'Brewers Gold',
            'aa' => 5.1
        ]);

        $ch = Lupulo::create([
            'variedad' => 'Chinook',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Columbus',
            'aa' => 15
        ]);

        Lupulo::create([
            'variedad' => 'Willamette',
            'aa' => 4.5
        ]);

        Lupulo::create([
            'variedad' => 'Fuggle',
            'aa' => 5.6
        ]);

        $nd = Lupulo::create([
            'variedad' => 'Northdown',
            'aa' => 0
        ]);

        $nb = Lupulo::create([
            'variedad' => 'Northern Brewer',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Saaz',
            'aa' => 3.5
        ]);

        Lupulo::create([
            'variedad' => 'Styrian Golding',
            'aa' => 5.25
        ]);

        $ga = Lupulo::create([
            'variedad' => 'Galena',
            'aa' => 0
        ]);

        Lupulo::create([
            'variedad' => 'Golding',
            'aa' => 5.6
        ]);

        Lupulo::create([
            'variedad' => 'Nugget',
            'aa' => 14
        ]);

        Lupulo::create([
            'variedad' => 'Hallertau',
            'aa' => 4.1
        ]);

        Lupulo::create([
            'variedad' => 'Perle',
            'aa' => 8.2
        ]);

	    Lupulo::create([
		    'variedad' => 'Liberty',
		    'aa' => 0
	    ]);

	    Lupulo::create([
		    'variedad' => 'Hallertau Hersbrucker',
//		    'country' => 'Germany',
//		    'aroma_profile' => ['Hay', 'Tobacco', 'Orange'],
//		    'styles' => ['Lager', 'Pilsner', 'Bock', 'Wheat', 'Kolsch', 'Helles'],
		    'aa' => 4,
//		    'alpha_acids' => [
//			    'min' => 1.5,
//			    'max' => 4
//		    ],
//		    'beta_acids' => [
//			    'min' => 2.5,
//			    'max' => 6
//		    ],
//		    'total_oil' => [
//			    'min' => 0.5,
//			    'max' => 1,
//			    'B-Pinene' => [
//				    'min' => 15,
//				    'max' => 30
//			    ],
//			    'Myrcene' => [
//				    'min' => 0.5,
//				    'max' => 1
//			    ],
//			    'Linalool' => [
//				    'min' => 8,
//				    'max' => 13
//			    ],
//			    'Caryophyllene' => [
//				    'min' => 8,
//				    'max' => 13
//			    ],
//			    'Farnesene' => [
//				    'min' => 0,
//				    'max' => 1
//			    ],
//			    'Humulene' => [
//				    'min' => 20,
//				    'max' => 30
//			    ],
//			    'Geraniol' => 0,
//			    'Selinene' => 0,
//			    'Other' => [
//				    'min' => 25,
//				    'max' => 56
//			    ],
//		    ],
	    ]);

	    $br->sustitutos()->save($ca);
        $br->sustitutos()->save($nd);
        $br->sustitutos()->save($nb);
        $br->sustitutos()->save($ga);
        $br->sustitutos()->save($ch);
    }
}
