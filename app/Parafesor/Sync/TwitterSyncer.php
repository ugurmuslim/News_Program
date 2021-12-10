<?php


namespace App\Parafesor\Sync;


use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CategorySectionTypes;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\ExternalSourceUser;

class TwitterSyncer
{
    public static function getTweetsFromScrappy()
    {
        ( new TwitterSyncer() )->updateTweets();
    }

    private function updateTweets()
    {
        $tweetFolder = "/var/backups/data/tweet";
        $userFolder = "/var/backups/data/user";

        $users = array_diff(scandir($userFolder), [ ".", ".." ]);
        foreach ($users as $user) {
            $data = file_get_contents($userFolder . '/' . $user);
            $jsonData = json_decode($data, true);
            try {
                ExternalSourceUser::updateOrCreate([
                    'external_site_id' => $jsonData['raw_data']['id_str'],
                ],
                    [
                        'article_type_id'    => ArticleTypes::Twitter,
                        'external_source_id' => ArticleTypes::Twitter,
                        'name'               => $jsonData['raw_data']['name'],
                        'image'              => $jsonData['raw_data']['profile_image_url_https'],
                    ]);
                unlink($userFolder . '/' . $user);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        $tweets = array_diff(scandir($tweetFolder), [ ".", ".." ]);
        foreach ($tweets as $tweet) {
            $data = file_get_contents($tweetFolder . '/' . $tweet);
            $jsonData = json_decode($data, true);
            $externalUser = ExternalSourceUser::where('external_site_id', $jsonData['raw_data']['user_id_str'])->first();
            $article = Article::where('external_site_id', $jsonData['raw_data']['id_str'])
                ->where('article_type_id', 5)
                ->first();

            if ($article) {
                unlink($tweetFolder . '/' . $tweet);
                continue;
            }
            if (!$externalUser) {
                continue;
            }
            try {
                Article::create([
                    'article_type_id'         => ArticleTypes::Twitter,
                    'body'                    => $jsonData['raw_data']['full_text'],
                    'status'                  => ArticleStatus::PUBLISHED,
                    'show_case'               => CategorySectionTypes::NORMAL,
                    'external_source_user_id' => $externalUser->id,
                    'external_site_id'        => $jsonData['raw_data']['id_str'],
                    'article_date'            => $jsonData['raw_data']['created_at'],
                    'language_id'             => 'TR',
                ]);
                unlink($tweetFolder . '/' . $tweet);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

    }
}
