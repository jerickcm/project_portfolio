<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function personal_data()
    {

        $training_certificates = [
            [
                "url" => "https://www.udemy.com/certificate/UC-3142d35c-73ad-46f8-9734-c9f5d669f18a/",
                "src" => "/assets/img/certificate/UC-3142d35c-73ad-46f8-9734-c9f5d669f18a.jpg",
                "title" => "AZ-900 Bootcamp: Microsoft Azure Fundamentals (OCT 2023)",
                "url2" => "https://www.udemy.com/certificate/UC-dbaa6490-1a6c-4553-bd2c-4751ab7b07c1/",
                "src2" => "/assets/img/certificate/UC-dbaa6490-1a6c-4553-bd2c-4751ab7b07c1.jpg",
                "title2" => "PHP with Laravel for beginners - Become a Master in Laravel",
                "url3" => "https://www.udemy.com/certificate/UC-735b5ac5-d6fc-4260-a51a-391b2e40b3e5/",
                "src3" => "/assets/img/certificate/UC-735b5ac5-d6fc-4260-a51a-391b2e40b3e5.jpg",
                "title3" => "Master Course : CC - Certified in Cybersecurity",
            ],
            [
                "url" => "https://www.udemy.com/certificate/UC-6c132fd1-8089-424b-a33a-931ec06c1b3b/",
                "src" => "/assets/img/certificate/UC-6c132fd1-8089-424b-a33a-931ec06c1b3b.jpg",
                "title" => "Project Management Crash Course in 60 Minutes",
                "url2" => "https://www.udemy.com/certificate/UC-a9104c52-224f-4bc8-8f91-c241e1c93951/",
                "src2" => "/assets/img/certificate/UC-a9104c52-224f-4bc8-8f91-c241e1c93951.jpg",
                "title2" => "React 18 Tutorial and Projects Course (2023)",
                "url3" => "https://www.udemy.com/certificate/UC-edaefdd0-8a94-4538-b760-54683d30fc35/",
                "src3" => "/assets/img/certificate/UC-edaefdd0-8a94-4538-b760-54683d30fc35.jpg",
                "title3" => "Slack the ultimate guide (2022)",
            ],
            [
                "url" => "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                "src" => "/assets/img/certificate/GoogleAdsDisplayCertification_Google.jpg",
                "title" => "Google Ads Display Certification",
                "url2" => "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                "src2" => "/assets/img/certificate/GoogleAdsSearchcertification_Google.jpg",
                "title2" => "Google Ads Search certification",
                "url3" => "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                "src3" => "/assets/img/certificate/GoogleAnalyticsIndividualQualification_Google.jpg",
                "title3" => "Google Analytics Individual Qualification",
            ],
            [
                "url" => "https://www.udemy.com/certificate/UC-d8cdf10a-62f9-493b-bc1b-e697fb2d5ab5/",
                "src" => "/assets/img/certificate/UC-d8cdf10a-62f9-493b-bc1b-e697fb2d5ab5.jpg",
                "title" => "Master Course : Google Cloud Professional Cloud Architect",
                "url2" => "https://www.udemy.com/certificate/UC-15129888-bae2-448d-b6b1-5277e131f8e2/",
                "src2" => "/assets/img/certificate/UC-a290868c-4777-4ae2-af45-8697b4df8ce5.jpg",
                "title2" => "Wordpress Beginners Guide Site Speed Optimization Made Easy",
                "url3" => "https://www.udemy.com/certificate/UC-15129888-bae2-448d-b6b1-5277e131f8e2/",
                "src3" => "/assets/img/certificate/UC-15129888-bae2-448d-b6b1-5277e131f8e2.jpg",
                "title3" => "Excel for Marketers",
            ],

        ];

        $website_projects = [
            [
                "sitename" => "Payco",
                "image" => "payco.jpg",
                "url" => "https://www.pay.co/",
                "contribution" => "",
            ],
            [
                "sitename" => "ForexMart",
                "image" => "forexmart.jpg",
                "url" => "https://www.forexmart.com/",
                "contribution" => "",
            ],
            [
                "sitename" => "Binary Instaforex",
                "image" => "binaryinstaforex.jpg",
                "url" => "https://binary.instaforex.com/",
                "contribution" => "",
            ],
            [
                "sitename" => "E27.co",
                "image" => "e27.jpg",
                "url" => "https://e27.co/",
                "contribution" => "",
            ],
            [
                "sitename" => "Orsat",
                "image" => "orsat.jpg",
                "url" => "https://orsatmax.com/",
                "contribution" => "",
            ],
            [
                "sitename" => "CSWDO Malolos Database",
                "image" => "cswdo.jpg",
                "url" => "https://cswdo.engrjerick.com/",
                "contribution" => "",
            ],
            [
                "sitename" => "Saipan Dol Workforce",
                "image" => "cnmidol.jpg",
                "url" => "https://www.cnmidol.com/",
                "contribution" => "",
            ],
            [
                "sitename" => "Japan Travel Information",
                "image" => "travelinfo.jpg",
                "url" => "https://travelinfo.engrjerick.com/",
                "contribution" => "",
            ],
        ];

        $testimonials = [
            [
                'message' => " Delivered outstanding results.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Will be working with him again.",
                'author' => "Ms. Candy Feliciano",
                'role' => "CNMI DOL Operations- Mariana Island",
            ],
            [
                'message' => "Top-notch solutions and a pleasure to work with.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Innovative solutions and exceptional support.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Highly skilled and professional.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => " Delivered outstanding results.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Will be working with him again.",
                'author' => "Ms. Candy Feliciano",
                'role' => "CNMI DOL Operations- Mariana Island",
            ],
            [
                'message' => "Top-notch solutions and a pleasure to work with.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Innovative solutions and exceptional support.",
                'author' => "",
                'role' => "",
            ],
            [
                'message' => "Highly skilled and professional.",
                'author' => "",
                'role' => "",
            ],
        ];

        $freelance  = [
            [
                'src' => "upwork.svg",
                'name' => "Upwork",
                'alt' => "Upwork",
                'url' => "https://www.upwork.com/freelancers/~015515782763c14dc3",
            ],
            [
                'src' => "fiverr-2.svg",
                'name' => "Fiverr",
                'alt' => "Fiverr",
                'url' => "https://www.fiverr.com/jerickmangalus",
            ],
        ];

        $techlogo  = [
            [
                'src' => "python-5.svg",
                'name' => "Phyton",
                'alt' => "Phyton",
            ],

            [
                'src' => "wordpress-icon.svg",
                'name' => "WordPress",
                'alt' => "WordPress",
            ],

            [
                'src' => "codeigniter-2.svg",
                'name' => "CodeIgniter",
                'alt' => "CodeIgniter",
            ],
            [
                'src' => "laravel-2.svg",
                'name' => "Laravel ",
                'alt' => "Laravel",
            ],

            [
                'src' => "vue-9.svg",
                'name' => "Vue 3 JS",
                'alt' => "Vue 3 JS",
            ],
            [
                'src' => "nuxt-2.svg",
                'name' => "Nuxt Js",
                'alt' => "Nuxt Js",
            ],
            [
                'src' => "react-2.svg",
                'name' => "React Js",
                'alt' => "React Js",
            ],

            [
                'src' => "ubuntu-icon.svg",
                'name' => "Ubuntu",
                'alt' => "Ubuntu",
            ],
            [
                'src' => "centos.svg",
                'name' => "CentOS",
                'alt' => "CentOS",
            ],
            [
                'src' => "nginx-1.svg",
                'name' => "Nginx",
                'alt' => "Nginx",
            ],
            [
                'src' => "apache-13.svg",
                'name' => "Apache",
                'alt' => "Apache",
            ],
            [
                'src' => "docker-3.svg",
                'name' => "Docker",
                'alt' => "Docker",
            ],
            [
                'src' => "rxjs-1.svg",
                'name' => "Rx Js",
                'alt' => "Rx Js",
            ],
        ];


        return response()->json(
            [
                'content' => [
                    'certificates' => $training_certificates,
                    'testimonials' => $testimonials,
                    'websites' => $website_projects,
                    'techlogo' => $techlogo,
                    'freelance' => $freelance,
                ],
                'success' => true,
                '_benchmark' => microtime(true) -  $this->time_start
            ]
        );
    }

    public function socials()
    {
        $socials  = [
            [
                "url" => "https://www.facebook.com/engrjerick",
                "src" => "/assets/img/logo/facebook-3-2.svg",
                'social' => 'facebook'
            ],
            [
                "url" => "https://www.linkedin.com/in/jerick-mangalus-92066499/",
                "src" => "/assets/img/logo/linkedin-icon-2.svg",
                'social' => 'linkedin'
            ],
            [
                "url" => "https://www.classcentral.com/@JerickCMangalus",
                "src" => "/assets/img/logo/classcentral.png",
                'social' => 'Class Central'
            ],
            [
                "url" => "https://github.com/jerickcm",
                "src" => "/assets/img/logo/github-icon-2.svg",
                'social' => 'Github'
            ],
        ];

        return response()->json(
            [
                'content' => [
                    "socials" => $socials,
                    "email" => "jerickmangalus@engrjerick.com",
                    "contact_number" => "+63-977-622-9501"
                ],
                'success' => true,
                '_benchmark' => microtime(true) -  $this->time_start
            ]
        );
    }
}
