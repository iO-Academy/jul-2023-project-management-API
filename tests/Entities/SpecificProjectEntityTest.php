<?php

namespace Entities;

use PHPUnit\Framework\TestCase;
use ProjectManager\Entities\SpecificProjectEntity;

class SpecificProjectEntityTest extends TestCase
{
    public function testSetUsers_success()
    {
        $mockUserEntity1 = $this->createMock(\ProjectManager\Entities\UserEntity::class);
        $mockUserEntity2 = $this->createMock(\ProjectManager\Entities\UserEntity::class);
        $mockUserEntity3 = $this->createMock(\ProjectManager\Entities\UserEntity::class);
        $specificProjectEntity = new SpecificProjectEntity();
        $result = $specificProjectEntity->setUsers([$mockUserEntity1, $mockUserEntity2, $mockUserEntity3]);
        $this->assertSame(true, $result);
    }

    public function testSetUsers_failure1()
    {
        $this->expectException(\Exception::class);
        $specificProjectEntity = new SpecificProjectEntity();
        $result = $specificProjectEntity->setUsers([3, 6, 9]);
    }

    public function testSetUsers_failure2()
    {
        $mockUserEntity1 = $this->createMock(\ProjectManager\Entities\UserEntity::class);
        $this->expectException(\Exception::class);
        $specificProjectEntity = new SpecificProjectEntity();
        $result = $specificProjectEntity->setUsers([$mockUserEntity1, 6, 9]);
    }

    public function testSetUsers_malformed()
    {
        $this->expectException(\TypeError::class);
        $specificProjectEntity = new SpecificProjectEntity();
        $result = $specificProjectEntity->setUsers('Hello Cosmin');
    }
}