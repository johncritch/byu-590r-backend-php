<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\DeviceDetail;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        $deviceDetails = [
            // iMac (1)
            [
                'model_name' => 'iMac G3',
                'description' => 'An iconic all-in-one computer with a transparent, colorful design.',
                'specifications' => '13-inch, CRT display, G3 processor',
                'picture' => $this->encodeImage('iMacG3'),
                'release_date' => '1998-08-15',
                'release_price' => 1299.00,
                'units_sold' => 2780000,
                'category_id' => 1
            ],
            [
                'model_name' => 'iMac G4',
                'description' => 'Known for its sunflower-inspired design with an adjustable LCD display.',
                'specifications' => '15-inch, LCD display, G4 processor',
                'picture' => $this->encodeImage('iMacG4'),
                'release_date' => '2002-01-07',
                'release_price' => 1799.00,
                'units_sold' => 1500000,
                'category_id' => 1
            ],

            // iPod (4)
            [
                'model_name' => 'iPod 1st Gen',
                'description' => 'The first model of the iPod, revolutionizing portable music.',
                'specifications' => 'Mechanical scroll wheel, 5 GB storage',
                'picture' => $this->encodeImage('iPod1stGen'),
                'release_date' => '2001-10-23',
                'release_price' => 399.00,
                'units_sold' => 390000,
                'category_id' => 4
            ],

            // iPhone (2)
            [
                'model_name' => 'iPhone 3G',
                'description' => 'The second-generation iPhone with App Store access.',
                'specifications' => '3G data, iOS 2',
                'picture' => $this->encodeImage('iPhone3G'),
                'release_date' => '2008-07-11',
                'release_price' => 199.00,
                'units_sold' => 12000000,
                'category_id' => 2
            ],
            // iPad (3)
            [
                'model_name' => 'iPad 1st Gen',
                'description' => 'Apple\'s first tablet computer.',
                'specifications' => '9.7-inch LCD, iOS',
                'picture' => $this->encodeImage('iPad'),
                'release_date' => '2010-04-03',
                'release_price' => 499.00,
                'units_sold' => 15000000,
                'category_id' => 3
            ],
            [
                'model_name' => 'Apple I',
                'description' => 'The original Apple computer hand-built by Steve Wozniak.',
                'specifications' => 'MOS 6502 processor, 4KB RAM',
                'release_date' => '1976-04-11',
                'release_price' => 666.66,
                'units_sold' => 200,
                'picture' => $this->encodeImage('AppleI'),
                'category_id' => 11 // Other
            ],
            [
                'model_name' => 'Apple II',
                'description' => 'One of the first successful mass-produced microcomputers.',
                'specifications' => 'MOS 6502 processor, 4KB–64KB RAM',
                'release_date' => '1977-06-10',
                'release_price' => 1298.00,
                'units_sold' => 5000000,
                'picture' => $this->encodeImage('AppleII'),
                'category_id' => 11
            ],
            [
                'model_name' => 'Lisa',
                'description' => 'The first Apple computer with a graphical user interface.',
                'specifications' => 'Motorola 68000 CPU, 1MB RAM',
                'release_date' => '1983-01-19',
                'release_price' => 9995.00,
                'units_sold' => 100000,
                'picture' => $this->encodeImage('Lisa'),
                'category_id' => 11
            ],
            [
                'model_name' => 'Macintosh 128K',
                'description' => 'The original Macintosh that introduced the mouse and GUI.',
                'specifications' => '8 MHz Motorola 68000, 128KB RAM',
                'release_date' => '1984-01-24',
                'release_price' => 2495.00,
                'units_sold' => 250000,
                'picture' => $this->encodeImage('Macintosh128K'),
                'category_id' => 1 // iMac
            ],
            [
                'model_name' => 'Macintosh SE',
                'description' => 'Compact Mac with an internal hard drive and expansion slot.',
                'specifications' => '8 MHz Motorola 68000, 1MB RAM',
                'release_date' => '1987-03-02',
                'release_price' => 2898.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('MacintoshSE'),
                'category_id' => 1
            ],
            [
                'model_name' => 'Macintosh Classic',
                'description' => 'Low-cost successor to the original Macintosh.',
                'specifications' => '8 MHz Motorola 68000, 1MB RAM',
                'release_date' => '1990-10-15',
                'release_price' => 999.00,
                'units_sold' => 1500000,
                'picture' => $this->encodeImage('MacintoshClassic'),
                'category_id' => 1
            ],
            [
                'model_name' => 'PowerBook 100',
                'description' => 'Apple’s first true laptop, introduced a new portable design.',
                'specifications' => '16 MHz Motorola 68HC000, 2MB RAM',
                'release_date' => '1991-10-21',
                'release_price' => 2500.00,
                'units_sold' => 100000,
                'picture' => $this->encodeImage('PowerBook100'),
                'category_id' => 10 // MacBook
            ],
            [
                'model_name' => 'Newton MessagePad 100',
                'description' => 'Early personal digital assistant (PDA) from Apple.',
                'specifications' => '20 MHz ARM 610, 640KB RAM',
                'release_date' => '1993-08-03',
                'release_price' => 699.00,
                'units_sold' => 200000,
                'picture' => $this->encodeImage('NewtonMessagePad100'),
                'category_id' => 11 // Other
            ],
            [
                'model_name' => 'iBook G3 Clamshell',
                'description' => 'Colorful consumer laptop with built-in Wi-Fi.',
                'specifications' => '300 MHz PowerPC G3, 32MB RAM',
                'release_date' => '1999-07-21',
                'release_price' => 1599.00,
                'units_sold' => 700000,
                'picture' => $this->encodeImage('iBookG3Clamshell'),
                'category_id' => 9 // iBook
            ],
            [
                'model_name' => 'Macintosh Portable',
                'description' => 'Apple’s first battery-powered Macintosh.',
                'specifications' => '16 MHz Motorola 68000, 1MB RAM',
                'release_date' => '1989-09-20',
                'release_price' => 6500.00,
                'units_sold' => 100000,
                'picture' => $this->encodeImage('MacintoshPortable'),
                'category_id' => 10
            ],
            [
                'model_name' => 'iPod Mini',
                'description' => 'Smaller version of the iPod with color choices.',
                'specifications' => '4GB/6GB HDD, Click Wheel',
                'release_date' => '2004-01-06',
                'release_price' => 249.00,
                'units_sold' => 2200000,
                'picture' => $this->encodeImage('iPodMini'),
                'category_id' => 4 // iPod
            ],
            [
                'model_name' => 'iPod Shuffle 1st Gen',
                'description' => 'Tiny iPod with no screen and random playback.',
                'specifications' => '512MB/1GB flash memory',
                'release_date' => '2005-01-11',
                'release_price' => 99.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('iPodShuffle1stGen'),
                'category_id' => 4
            ],
            [
                'model_name' => 'iPod Nano 1st Gen',
                'description' => 'Thin iPod with color screen and flash memory.',
                'specifications' => '1GB/2GB/4GB storage',
                'release_date' => '2005-09-07',
                'release_price' => 149.00,
                'units_sold' => 10000000,
                'picture' => $this->encodeImage('iPodNano1stGen'),
                'category_id' => 4
            ],
            [
                'model_name' => 'iMac G5',
                'description' => 'Sleek all-in-one with PowerPC G5 chip.',
                'specifications' => '1.6–2.1 GHz PowerPC G5, 256MB–2.5GB RAM',
                'release_date' => '2004-08-31',
                'release_price' => 1299.00,
                'units_sold' => 2000000,
                'picture' => $this->encodeImage('iMacG5'),
                'category_id' => 1
            ],
            [
                'model_name' => 'MacBook 2006',
                'description' => 'First Intel-based consumer laptop from Apple.',
                'specifications' => 'Intel Core Duo, 512MB RAM',
                'release_date' => '2006-05-16',
                'release_price' => 1099.00,
                'units_sold' => 10000000,
                'picture' => $this->encodeImage('MacBook2006'),
                'category_id' => 10
            ],
            [
                'model_name' => 'iPod Video',
                'description' => 'First iPod capable of playing videos.',
                'specifications' => '30/60/80GB HDD, 2.5” color display',
                'release_date' => '2005-10-12',
                'release_price' => 299.00,
                'units_sold' => 10000000,
                'picture' => $this->encodeImage('iPodVideo'),
                'category_id' => 4
            ],
            [
                'model_name' => 'iBook G4',
                'description' => 'Last model in the iBook line before MacBook.',
                'specifications' => 'PowerPC G4, 256MB RAM',
                'release_date' => '2003-10-22',
                'release_price' => 999.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('iBookG4'),
                'category_id' => 9
            ],
            [
                'model_name' => 'Macintosh Plus',
                'description' => 'An enhanced original Mac with SCSI support.',
                'specifications' => '8 MHz 68000, 1MB RAM, SCSI',
                'release_date' => '1986-01-16',
                'release_price' => 2599.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('MacintoshPlus'),
                'category_id' => 1
            ],
            [
                'model_name' => 'eMac',
                'description' => 'All-in-one Mac targeted at education markets.',
                'specifications' => '700 MHz – 1.42 GHz PowerPC G4',
                'release_date' => '2002-04-29',
                'release_price' => 1099.00,
                'units_sold' => 2000000,
                'picture' => $this->encodeImage('eMac'),
                'category_id' => 1
            ],
            [
                'model_name' => 'iPod Touch 1st Gen',
                'description' => 'iPhone-like iPod with multitouch screen.',
                'specifications' => '4GB/8GB/16GB storage, Wi-Fi',
                'release_date' => '2007-09-05',
                'release_price' => 299.00,
                'units_sold' => 6000000,
                'picture' => $this->encodeImage('iPodTouch1stGen'),
                'category_id' => 4
            ],
            [
                'model_name' => 'Apple TV 1st Gen',
                'description' => 'First digital media receiver from Apple.',
                'specifications' => '40/160GB HDD, HDMI, Wi-Fi',
                'release_date' => '2007-03-21',
                'release_price' => 299.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('AppleTV1stGen'),
                'category_id' => 6
            ],
            [
                'model_name' => 'Apple USB Mouse',
                'description' => 'Also known as the “hockey puck” mouse, introduced with iMac G3.',
                'specifications' => 'USB, circular design',
                'release_date' => '1998-08-15',
                'release_price' => 49.00,
                'units_sold' => 2000000,
                'picture' => $this->encodeImage('AppleUSBMouse'),
                'category_id' => 7
            ],
            [
                'model_name' => 'iPod Dock',
                'description' => 'Accessory for charging and syncing early iPods.',
                'specifications' => '30-pin connector, stereo out',
                'release_date' => '2003-04-28',
                'release_price' => 39.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('iPodDock'),
                'category_id' => 7
            ],
            [
                'model_name' => 'Mac OS System 7',
                'description' => 'Popular classic Mac OS version from the early ’90s.',
                'specifications' => '32-bit OS with multitasking',
                'release_date' => '1991-05-13',
                'release_price' => 99.00,
                'units_sold' => 2000000,
                'picture' => $this->encodeImage('MacOSSystem7'),
                'category_id' => 8
            ],
            [
                'model_name' => 'iLife 2006',
                'description' => 'Suite of creative apps: iMovie, iPhoto, GarageBand, iDVD.',
                'specifications' => 'Mac OS X, Intel/PowerPC support',
                'release_date' => '2006-01-10',
                'release_price' => 79.00,
                'units_sold' => 1000000,
                'picture' => $this->encodeImage('iLife2006'),
                'category_id' => 8
            ],
            [
                'model_name' => 'Macintosh Watch',
                'description' => 'Rare promotional item from the 1990s given to developers.',
                'specifications' => 'Analog watch with classic Mac face',
                'release_date' => '1995-01-01',
                'release_price' => 0.00,
                'units_sold' => 1000,
                'picture' => $this->encodeImage('MacintoshWatch'),
                'category_id' => 5
            ],
            [
                'model_name' => 'iPhone 2G',
                'description' => 'The original iPhone that started the smartphone revolution.',
                'specifications' => '3.5-inch screen, 2MP camera, 4/8/16GB storage',
                'release_date' => '2007-06-29',
                'release_price' => 499.00,
                'units_sold' => 6100000,
                'picture' => $this->encodeImage('iPhone2G'),
                'category_id' => 2
            ],
        ];

        foreach ($deviceDetails as $detail) {
            $categoryId = $detail['category_id'] ?? null;
            unset($detail['category_id']);

            $detailRecord = DeviceDetail::create($detail);

            Device::create([
                'category_id' => $categoryId,
                'details_id' => $detailRecord->id,
            ]);
        }
    }

    private function getImagePath($fileName)
    {
        return '/images/' . $fileName . '.png';
    }

    private function encodeImage($name)
    {
        return $this->getImagePath($name);
    }
}
