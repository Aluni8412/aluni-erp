<?php
namespace Global\Services;

use OpenAI\Client;

class TranslationService {
    private $client;

    public function __construct() {
        $this->client = new Client($_ENV['OPENAI_API_KEY']);
    }

    public function translate($text, $targetLanguage) {
        $response = $this->client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => "Translate to $targetLanguage: $text",
            'max_tokens' => 60,
        ]);
        return $response['choices'][0]['text'];
    }
}