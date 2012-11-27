<?php

namespace Gitlab\Model;

class Tag extends AbstractModel
{
    protected static $_properties = array(
        'name',
        'commit',
        'project'
    );

    public static function fromArray(Project $project, array $data)
    {
        $branch = new Tag($project, $data['name']);

        if (isset($data['commit'])) {
            $data['commit'] = Commit::fromArray($data['commit']);
        }

        return $branch->hydrate($data);
    }

    public function __construct(Project $project, $name = null)
    {
        $this->project = $project;
        $this->name = $name;
    }

}