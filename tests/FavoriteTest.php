<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavoriteTest extends TestCase
{
    use LearnParty\Tests\PersistTestData;
    use DatabaseMigrations;

    /**
     * Test to assert that a user can favorite and unfavorite
     * a video.
     *
     * @return void
     */
    public function testUserCanfavoriteAndUnfavoriteVideo()
    {
        $user = $this->createAndLoginUser();
        $video = factory('LearnParty\Video')->create();

        $feedback = $this->actingAs($user)
             ->call('POST', 'favorites/update', [
                'video_id' => $video->id
             ]);
        $this->assertTrue(is_array($feedback->original));
        $this->assertEquals('favorited', $feedback->original['message']);

         $feedback = $this->actingAs($user)
             ->call('POST', 'favorites/update', [
                'video_id' => $video->id
             ]);

         $this->assertTrue(is_array($feedback->original));
         $this->assertEquals('unfavorited', $feedback->original['message']);
    }
}
