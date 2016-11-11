<?php

use Midbound\Sequences\URLCleaner\URLCleaner;

/**
 * Class URLCleanerTest
 */
class URLCleanerTest extends TestCase
{
    /** @test */
    public function it_does_not_format_an_empty_string()
    {
        $url = (new URLCleaner)->clean('');

        $this->assertEmpty($url);
    }

    /** @test */
    public function it_can_clean_a_url_with_http()
    {
        $url = 'http://www.example.com/my-blog-post/';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_clean_a_url_with_https()
    {
        $url = 'https://www.example.com/my-blog-post/';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_clean_a_url_with_double_slash()
    {
        $url = '//www.example.com/my-blog-post/';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_clean_a_url_with_no_scheme()
    {
        $url = 'www.example.com/my-blog-post/';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_clean_a_url_and_keep_query_params()
    {
        $url = 'http://www.google.fr?q=keyword&f=filter';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.google.fr?q=keyword&f=filter', $url);
    }

    /** @test */
    public function it_can_clean_a_basic_url_with_trailing_slash()
    {
        $url = 'http://www.google.fr/example/';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('www.google.fr/example', $url);
    }

    /** @test */
    public function it_can_remove_google_analytics_params()
    {
        $url = 'https://example.com/my-blog-post?utm_source=newsletter&utm_medium=email&utm_campaign=halloween&utm_term=my-awesome-tag&utm_content=my-awesome-content';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_remove_google_analytics_params_when_there_is_a_trailing_slash()
    {
        $url = 'https://example.com/my-blog-post/?utm_source=newsletter&utm_medium=email&utm_campaign=halloween&utm_term=my-awesome-tag&utm_content=my-awesome-content';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('example.com/my-blog-post', $url);
    }

    /** @test */
    public function it_can_remove_google_analytics_params_and_keep_other_query_params()
    {
        $url = 'https://example.com/my-blog-post?page=2&utm_source=newsletter&my-param=example&utm_medium=email&utm_campaign=halloween&utm_term=my-awesome-tag&utm_content=my-awesome-content';

        $url = (new URLCleaner)->clean($url);

        $this->assertEquals('example.com/my-blog-post?page=2&my-param=example', $url);
    }
}
