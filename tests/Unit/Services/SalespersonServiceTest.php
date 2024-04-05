<?php

namespace Tests\Unit;

use App\Repositories\SalespersonRepository;
use App\Services\SalespersonService;
use PHPUnit\Framework\TestCase;

class SalespersonServiceTest extends TestCase
{
    private $salespersonRepository;
    private $salespersonService;

    /**
     * Initial setup for each test
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->salespersonRepository = $this->createMock(SalespersonRepository::class);
        $this->salespersonService = new SalespersonService($this->salespersonRepository);
    }

    /**
     * Cleaning after each test
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Testa o método createSalesperson() para garantir que um vendedor seja criado corretamente.
     */
    public function testCreateSalesperson()
    {
        $this->salespersonRepository
        ->expects($this->once())
        ->method('create')
        ->with([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ])
        ->willReturn([
            [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com']
        ]);

        $salesperson = $this->salespersonService->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);


        $this->assertEquals([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ], $salesperson[0]);
    }

        /**
     * Testa o método getSalesperson() para garantir que um vendedor seja obtido com sucesso.
     */
    public function testGetSallers()
    {
        $this->salespersonRepository
        ->expects($this->once())
        ->method('create')
        ->willReturn([
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Mary Doe', 'email' => 'mary@example.com']
        ]);

        $salespersonList = $this->salespersonService->getSallers();

        $this->assertEquals([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ], $salespersonList[0]);
        $this->assertCount(2, $salespersonList);
    }
}
