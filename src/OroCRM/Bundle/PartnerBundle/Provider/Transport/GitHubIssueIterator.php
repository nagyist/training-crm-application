<?php

namespace OroCRM\Bundle\PartnerBundle\Provider\Transport;

use Github\Client;

class GitHubIssueIterator extends AbstractGitHubRestIterator
{
    /** @var string */
    protected $gitHubOrganization;

    /** @var string */
    protected $gitHubRepo;

    /**
     * @param Client $client
     * @param string $gitHubOrganization
     * @param string $gitHubRepo
     * @param array  $params
     * @param int    $batchSize
     */
    public function __construct(
        Client $client,
        $gitHubOrganization,
        $gitHubRepo,
        array $params = [],
        $batchSize = self::BATCH_SIZE
    ) {
        parent::__construct($client, $params, $batchSize);
        $this->gitHubOrganization = $gitHubOrganization;
        $this->gitHubRepo = $gitHubRepo;
    }

    /**
     * {@inheritdoc}
     */
    protected function getResult($params)
    {
        return $this->client->issues()->all(
            $this->gitHubOrganization,
            $this->gitHubRepo,
            array_merge($this->params, $params)
        );
    }
}
