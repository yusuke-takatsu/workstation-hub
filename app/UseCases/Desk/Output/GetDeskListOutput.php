<?php

declare(strict_types=1);

namespace App\UseCases\Desk\Output;

use App\Domain\Entities\Category\CategoryEntity;
use App\Domain\Entities\Desk\DeskEntity;
use App\Domain\Entities\DeskImage\DeskImageEntity;
use App\Domain\Entities\Profile\ProfileEntity;
use App\Domain\Entities\User\UserEntity;

class GetDeskListOutput
{
    /**
     * @param  array  $entities
     */
    public function __construct(
        private readonly array $entities,
    ) {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $responseData = [];

        foreach ($this->entities as $entity) {
            $desk = $this->formatDeskEntityToArray($entity['desk']);
            $user = $this->formatUserEntityToArray($entity['user']);
            $profile = $this->formatProfileEntityToArray($entity['profile']);

            $categories = [];
            $images = [];

            foreach ($entity['categories'] as $category) {
              $categories[] = $this->formatCategoryEntityToArray($category);
            }
            foreach ($entity['images'] as $image) {
              $images[] = $this->formatImageEntityToArray($image);
            }

            $responseData[] = [
                'desk' => $desk,
                'user' => $user,
                'profile' => $profile,
                'categories' => $categories,
                'images' => $images,
            ];
        }

        return $responseData;
    }

    /**
     * @param  DeskEntity  $desk
     * @return array
     */
    private function formatDeskEntityToArray(DeskEntity $desk): array
    {
        return $desk->toArray();
    }

    /**
     * @param  UserEntity  $user
     * @return array
     */
    private function formatUserEntityToArray(UserEntity $user): array
    {
        return $user->toArray();
    }

    /**
     * @param  ProfileEntity|null  $profile
     * @return array
     */
    private function formatProfileEntityToArray(?ProfileEntity $profile): array|null
    {
        return is_null($profile) ? null : $profile->toArray();
    }

    /**
     * @param  CategoryEntity  $category
     * @return array
     */
    private function formatCategoryEntityToArray(CategoryEntity $category): array
    {
        return $category->toArray();
    }

    /**
     * @param  DeskImageEntity  $image
     * @return array
     */
    private function formatImageEntityToArray(DeskImageEntity $image): array
    {
        return $image->toArray();
    }
}