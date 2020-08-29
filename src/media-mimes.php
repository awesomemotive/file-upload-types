<?php
/**
 * MIME Aliases
 *
 * This file was generated automatically on 2017-11-09 16:40:50.
 *
 * @see {https://github.com/Blobfolio/blob-mimes}
 * @see {https://github.com/Blobfolio/wp-blob-mimes}
 * @see {https://core.trac.wordpress.org/ticket/40175}
 * @see {https://core.trac.wordpress.org/ticket/39963}
 *
 * @package WordPress
 * @subpackage Media
 */
/**
 * Data Source: IANA
 *
 * @see {https://www.iana.org/assignments/media-types}
 *
 * @copyright 2017 IETF Trust
 * @license https://www.rfc-editor.org/copyright/ rfc-copyright-story
 */
/**
 * Data Source: Apache
 *
 * @see {https://raw.githubusercontent.com/apache/httpd/trunk/docs/conf/mime.types}
 *
 * @copyright 2017 The Apache Software Foundation
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache
 */
/**
 * Data Source: Nginx
 *
 * @see {http://hg.nginx.org/nginx/raw-file/default/conf/mime.types}
 *
 * @copyright 2017 NGINX Inc.
 * @license https://opensource.org/licenses/BSD-2-Clause BSD
 */
/**
 * Data Source: Freedesktop.org
 *
 * @see {https://cgit.freedesktop.org/xdg/shared-mime-info/plain/freedesktop.org.xml.in}
 *
 * @copyright 2017 Freedesktop.org
 * @license https://opensource.org/licenses/MIT MIT
 */
/**
 * Data Source: Apache Tika
 *
 * @see {https://raw.githubusercontent.com/apache/tika/master/tika-core/src/main/resources/org/apache/tika/mime/tika-mimetypes.xml}
 *
 * @copyright 2017 The Apache Software Foundation
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache
 */
/**
 * Return MIME Aliases
 *
 * @since 5.0.0
 *
 * @return array MIME aliases organized by file extension. See data below for example.
 */
function wp_get_mime_aliases() {
        static $aliases;
        if ( ! is_array( $aliases ) ) {
                $aliases = array(
                        '1km' => array(
                                'application/1000minds.decision-model+xml'
                        ),
                        '32x' => array(
                                'application/genesis-32x-rom'
                        ),
                        '3dml' => array(
                                'text/in3d.3dml'
                        ),
                        '3ds' => array(
                                'image/3ds'
                        ),
                        '3fr' => array(
                                'image/raw-hasselblad'
                        ),
                        '3g2' => array(
                                'audio/3gpp2',
                                'video/3gpp2',
                                'video/mp4'
                        ),
                        '3ga' => array(
                                'audio/3gpp',
                                'audio/3gpp-encrypted',
                                'audio/rn-3gpp-amr',
                                'audio/rn-3gpp-amr-encrypted',
                                'audio/rn-3gpp-amr-wb',
                                'audio/rn-3gpp-amr-wb-encrypted',
                                'video/3gp',
                                'video/3gpp',
                                'video/3gpp-encrypted',
                                'video/mp4'
                        ),
                        '3gp' => array(
                                'audio/3gpp',
                                'audio/3gpp-encrypted',
                                'audio/rn-3gpp-amr',
                                'audio/rn-3gpp-amr-encrypted',
                                'audio/rn-3gpp-amr-wb',
                                'audio/rn-3gpp-amr-wb-encrypted',
                                'video/3gp',
                                'video/3gpp',
                                'video/3gpp-encrypted',
                                'video/mp4'
                        ),
                        '3gp2' => array(
                                'audio/3gpp2',
                                'video/3gpp2',
                                'video/mp4'
                        ),
                        '3gpp' => array(
                                'audio/3gpp',
                                'audio/3gpp-encrypted',
                                'audio/rn-3gpp-amr',
                                'audio/rn-3gpp-amr-encrypted',
                                'audio/rn-3gpp-amr-wb',
                                'audio/rn-3gpp-amr-wb-encrypted',
                                'video/3gp',
                                'video/3gpp',
                                'video/3gpp-encrypted',
                                'video/mp4'
                        ),
                        '3gpp2' => array(
                                'audio/3gpp2',
                                'video/3gpp2',
                                'video/mp4'
                        ),
                        '3mf' => array(
                                'application/ms-3mfdocument',
                                'model/3mf'
                        ),
                        '4th' => array(
                                'text/forth',
                                'text/plain'
                        ),
                        '7z' => array(
                                'application/7z-compressed'
                        ),
                        'a26' => array(
                                'application/atari-2600-rom'
                        ),
                        'a2l' => array(
                                'application/a2l'
                        ),
                        'a78' => array(
                                'application/atari-7800-rom'
                        ),
                        'aa' => array(
                                'audio/audible',
                                'audio/audible.aax',
                                'audio/pn-audibleaudio'
                        ),
                        'aab' => array(
                                'application/authorware-bin'
                        ),
                        'aac' => array(
                                'audio/aac'
                        ),
                        'aam' => array(
                                'application/authorware-map'
                        ),
                        'aart' => array(
                                'text/plain'
                        ),
                        'aas' => array(
                                'application/authorware-seg'
                        ),
                        'aax' => array(
                                'audio/audible',
                                'audio/audible.aax',
                                'audio/pn-audibleaudio'
                        ),
                        'abs-linkmap' => array(
                                'text/plain'
                        ),
                        'abs-menulinks' => array(
                                'text/plain'
                        ),
                        'abw' => array(
                                'application/abiword',
                                'application/xml'
                        ),
                        'ac' => array(
                                'application/nokia.n-gage.ac+xml',
                                'application/pkix-attr-cert',
                                'text/plain'
                        ),
                        'ac3' => array(
                                'audio/ac3'
                        ),
                        'acc' => array(
                                'application/americandynamics.acc'
                        ),
                        'ace' => array(
                                'application/ace',
                                'application/ace-compressed'
                        ),
                        'acfm' => array(
                                'application/font-adobe-metric'
                        ),
                        'acu' => array(
                                'application/acucobol',
                                'application/vnd-acucobol'
                        ),
                        'acutc' => array(
                                'application/acucorp'
                        ),
                        'ad' => array(
                                'text/asciidoc',
                                'text/plain'
                        ),
                        'ada' => array(
                                'text/ada',
                                'text/plain'
                        ),
                        'adb' => array(
                                'text/ada',
                                'text/adasrc',
                                'text/plain'
                        ),
                        'adf' => array(
                                'application/amiga-disk-format'
                        ),
                        'adoc' => array(
                                'text/asciidoc',
                                'text/plain'
                        ),
                        'adp' => array(
                                'audio/adpcm'
                        ),
                        'ads' => array(
                                'text/ada',
                                'text/adasrc',
                                'text/plain'
                        ),
                        'aep' => array(
                                'application/adobe.aftereffects.project',
                                'application/audiograph'
                        ),
                        'aet' => array(
                                'application/adobe.aftereffects.template'
                        ),
                        'afm' => array(
                                'application/font-adobe-metric',
                                'application/font-afm',
                                'application/font-type1'
                        ),
                        'afp' => array(
                                'application/ibm.modcap'
                        ),
                        'ag' => array(
                                'image/applix-graphics'
                        ),
                        'agb' => array(
                                'application/gba-rom'
                        ),
                        'ahead' => array(
                                'application/ahead.space'
                        ),
                        'ai' => array(
                                'application/adobe.illustrator',
                                'application/illustrator',
                                'application/postscript'
                        ),
                        'aif' => array(
                                'application/iff',
                                'audio/aiff'
                        ),
                        'aifc' => array(
                                'application/iff',
                                'audio/aifc',
                                'audio/aiff',
                                'audio/aiffc'
                        ),
                        'aiff' => array(
                                'application/iff',
                                'audio/aiff'
                        ),
                        'aiffc' => array(
                                'application/iff',
                                'audio/aifc',
                                'audio/aiffc'
                        ),
                        'air' => array(
                                'application/adobe.air-application-installer-package+zip'
                        ),
                        'ait' => array(
                                'application/dvb.ait'
                        ),
                        'aj' => array(
                                'text/aspectj',
                                'text/plain'
                        ),
                        'al' => array(
                                'application/executable',
                                'application/perl',
                                'text/perl',
                                'text/plain'
                        ),
                        'alz' => array(
                                'application/alz'
                        ),
                        'am' => array(
                                'text/plain'
                        ),
                        'amfm' => array(
                                'application/font-adobe-metric'
                        ),
                        'ami' => array(
                                'application/amiga.ami'
                        ),
                        'aml' => array(
                                'application/aml'
                        ),
                        'amr' => array(
                                'audio/amr',
                                'audio/amr-encrypted'
                        ),
                        'amz' => array(
                                'audio/amzxml'
                        ),
                        'ani' => array(
                                'application/navi-animation'
                        ),
                        'anpa' => array(
                                'text/iptc.anpa'
                        ),
                        'anx' => array(
                                'application/annodex'
                        ),
                        'any' => array(
                                'application/mitsubishi.misty-guard.trustweb'
                        ),
                        'ape' => array(
                                'audio/ape'
                        ),
                        'apk' => array(
                                'application/android.package-archive',
                                'application/java-archive'
                        ),
                        'apkg' => array(
                                'application/anki'
                        ),
                        'apng' => array(
                                'image/mozilla.apng'
                        ),
                        'appcache' => array(
                                'text/cache-manifest'
                        ),
                        'appimage' => array(
                                'application/appimage',
                                'application/executable',
                                'application/iso9660-appimage'
                        ),
                        'applescript' => array(
                                'text/applescript',
                                'text/plain'
                        ),
                        'application' => array(
                                'application/ms-application'
                        ),
                        'apr' => array(
                                'application/lotus-approach'
                        ),
                        'apxml' => array(
                                'application/auth-policy+xml'
                        ),
                        'ar' => array(
                                'application/archive',
                                'application/unix-archive'
                        ),
                        'arc' => array(
                                'application/freearc',
                                'application/internet-archive'
                        ),
                        'arj' => array(
                                'application/arj',
                                'application/arj-compressed'
                        ),
                        'arw' => array(
                                'image/dcraw',
                                'image/raw-sony',
                                'image/sony-arw'
                        ),
                        'as' => array(
                                'application/applix-spreadsheet',
                                'text/actionscript',
                                'text/plain'
                        ),
                        'asc' => array(
                                'application/pgp',
                                'application/pgp-encrypted',
                                'application/pgp-keys',
                                'application/pgp-signature',
                                'text/plain'
                        ),
                        'ascii' => array(
                                'text/ascii-art'
                        ),
                        'asciidoc' => array(
                                'text/asciidoc',
                                'text/plain'
                        ),
                        'asf' => array(
                                'application/ms-asf',
                                'video/ms-asf',
                                'video/ms-asf-plugin',
                                'video/ms-wm'
                        ),
                        'asice' => array(
                                'application/etsi.asic-e+zip',
                                'application/zip'
                        ),
                        'asics' => array(
                                'application/etsi.asic-s+zip',
                                'application/zip'
                        ),
                        'asm' => array(
                                'text/asm',
                                'text/assembly',
                                'text/plain'
                        ),
                        'asnd' => array(
                                'audio/adobe.soundbooth'
                        ),
                        'aso' => array(
                                'application/accpac.simply.aso'
                        ),
                        'asp' => array(
                                'application/asp',
                                'text/asp',
                                'text/plain'
                        ),
                        'aspx' => array(
                                'text/aspdotnet',
                                'text/plain'
                        ),
                        'ass' => array(
                                'text/plain',
                                'text/ssa'
                        ),
                        'asx' => array(
                                'application/ms-asx',
                                'application/xml',
                                'audio/ms-asx',
                                'video/ms-asf',
                                'video/ms-wax',
                                'video/ms-wmx',
                                'video/ms-wvx'
                        ),
                        'atc' => array(
                                'application/acucorp'
                        ),
                        'atf' => array(
                                'application/atf'
                        ),
                        'atfx' => array(
                                'application/atfx'
                        ),
                        'atom' => array(
                                'application/atom+xml',
                                'application/xml'
                        ),
                        'atomcat' => array(
                                'application/atomcat+xml'
                        ),
                        'atomdeleted' => array(
                                'application/atomdeleted+xml'
                        ),
                        'atomsvc' => array(
                                'application/atomsvc+xml'
                        ),
                        'atx' => array(
                                'application/antix.game-component'
                        ),
                        'atxml' => array(
                                'application/atxml'
                        ),
                        'au' => array(
                                'audio/basic'
                        ),
                        'auc' => array(
                                'application/tamp-apex-update-confirm'
                        ),
                        'automount' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'avf' => array(
                                'video/avi',
                                'video/divx',
                                'video/msvideo'
                        ),
                        'avi' => array(
                                'video/avi',
                                'video/divx',
                                'video/msvideo'
                        ),
                        'aw' => array(
                                'application/applix-word',
                                'application/applixware'
                        ),
                        'awb' => array(
                                'audio/amr-wb',
                                'audio/amr-wb-encrypted'
                        ),
                        'awk' => array(
                                'application/awk',
                                'application/executable',
                                'text/awk',
                                'text/plain'
                        ),
                        'axa' => array(
                                'application/annodex',
                                'audio/annodex'
                        ),
                        'axv' => array(
                                'application/annodex',
                                'video/annodex'
                        ),
                        'axx' => array(
                                'application/axcrypt'
                        ),
                        'azf' => array(
                                'application/airzip.filesecure.azf'
                        ),
                        'azs' => array(
                                'application/airzip.filesecure.azs'
                        ),
                        'azv' => array(
                                'image/airzip.accelerator.azv'
                        ),
                        'azw' => array(
                                'application/amazon.ebook'
                        ),
                        'azw3' => array(
                                'application/amazon.mobi8-ebook'
                        ),
                        'bak' => array(
                                'application/trash'
                        ),
                        'bar' => array(
                                'application/qualcomm.brew-app-res'
                        ),
                        'bas' => array(
                                'text/basic',
                                'text/plain'
                        ),
                        'bash' => array(
                                'application/sh',
                                'text/plain'
                        ),
                        'bat' => array(
                                'application/bat',
                                'application/msdownload',
                                'text/plain'
                        ),
                        'bay' => array(
                                'image/raw-casio'
                        ),
                        'bcpio' => array(
                                'application/bcpio'
                        ),
                        'bdf' => array(
                                'application/font-bdf'
                        ),
                        'bdm' => array(
                                'application/syncml.dm+wbxml',
                                'video/mp2t'
                        ),
                        'bdmv' => array(
                                'video/mp2t'
                        ),
                        'bed' => array(
                                'application/realvnc.bed'
                        ),
                        'bh2' => array(
                                'application/fujitsu.oasysprs'
                        ),
                        'bib' => array(
                                'application/bibtex-text-file',
                                'text/bibtex',
                                'text/plain'
                        ),
                        'bibtex' => array(
                                'application/bibtex-text-file',
                                'text/plain'
                        ),
                        'bin' => array(
                                'application/octet-stream',
                                'application/saturn-rom',
                                'application/sega-cd-rom'
                        ),
                        'bkm' => array(
                                'application/nervana'
                        ),
                        'blb' => array(
                                'application/blorb'
                        ),
                        'blend' => array(
                                'application/blender'
                        ),
                        'blender' => array(
                                'application/blender'
                        ),
                        'blorb' => array(
                                'application/blorb'
                        ),
                        'bmi' => array(
                                'application/bmi'
                        ),
                        'bmml' => array(
                                'application/balsamiq.bmml+xml'
                        ),
                        'bmp' => array(
                                'image/bmp',
                                'image/ms-bmp'
                        ),
                        'bmpr' => array(
                                'application/balsamiq.bmpr'
                        ),
                        'book' => array(
                                'application/framemaker'
                        ),
                        'box' => array(
                                'application/previewsystems.box'
                        ),
                        'boz' => array(
                                'application/bzip',
                                'application/bzip2'
                        ),
                        'bpg' => array(
                                'image/bpg'
                        ),
                        'bpk' => array(
                                'application/octet-stream'
                        ),
                        'bpm' => array(
                                'application/bizagi-modeler',
                                'application/zip'
                        ),
                        'bsdiff' => array(
                                'application/bsdiff'
                        ),
                        'bsp' => array(
                                'model/valve.source.compiled-map'
                        ),
                        'btf' => array(
                                'image/prs.btif'
                        ),
                        'btif' => array(
                                'image/prs.btif'
                        ),
                        'bz' => array(
                                'application/bzip',
                                'application/bzip2'
                        ),
                        'bz2' => array(
                                'application/bzip',
                                'application/bzip2'
                        ),
                        'c' => array(
                                'text/c'
                        ),
                        'c11amc' => array(
                                'application/cluetrust.cartomobile-config'
                        ),
                        'c11amz' => array(
                                'application/cluetrust.cartomobile-config-pkg'
                        ),
                        'c3ex' => array(
                                'application/cccex'
                        ),
                        'c4d' => array(
                                'application/clonk.c4group'
                        ),
                        'c4f' => array(
                                'application/clonk.c4group'
                        ),
                        'c4g' => array(
                                'application/clonk.c4group'
                        ),
                        'c4p' => array(
                                'application/clonk.c4group'
                        ),
                        'c4u' => array(
                                'application/clonk.c4group'
                        ),
                        'cab' => array(
                                'application/ms-cab-compressed',
                                'application/ubisoft.webplayer',
                                'zz-application/zz-winassoc-cab'
                        ),
                        'cacerts' => array(
                                'application/java-keystore'
                        ),
                        'caf' => array(
                                'audio/caf'
                        ),
                        'cap' => array(
                                'application/pcap',
                                'application/tcpdump.pcap'
                        ),
                        'car' => array(
                                'application/curl.car'
                        ),
                        'cat' => array(
                                'application/ms-pki.seccat'
                        ),
                        'cb7' => array(
                                'application/7z-compressed',
                                'application/cb7',
                                'application/cbr'
                        ),
                        'cba' => array(
                                'application/cbr'
                        ),
                        'cbl' => array(
                                'text/cobol',
                                'text/plain'
                        ),
                        'cbor' => array(
                                'application/cbor',
                                'application/cose',
                                'application/cose-key',
                                'application/cose-key-set'
                        ),
                        'cbr' => array(
                                'application/cbr',
                                'application/rar'
                        ),
                        'cbt' => array(
                                'application/cbr',
                                'application/cbt',
                                'application/tar'
                        ),
                        'cbz' => array(
                                'application/cbr',
                                'application/cbz',
                                'application/comicbook+zip',
                                'application/zip'
                        ),
                        'cc' => array(
                                'text/c',
                                'text/c++src',
                                'text/csrc',
                                'text/plain'
                        ),
                        'ccc' => array(
                                'text/net2phone.commcenter.command'
                        ),
                        'ccmp' => array(
                                'application/ccmp+xml'
                        ),
                        'ccmx' => array(
                                'application/ccmx',
                                'text/plain'
                        ),
                        'cco' => array(
                                'application/cocoa'
                        ),
                        'cct' => array(
                                'application/director'
                        ),
                        'ccxml' => array(
                                'application/ccxml+xml'
                        ),
                        'cdbcmsg' => array(
                                'application/contact.cmsg'
                        ),
                        'cdf' => array(
                                'application/netcdf'
                        ),
                        'cdfx' => array(
                                'application/cdfx+xml'
                        ),
                        'cdkey' => array(
                                'application/mediastation.cdkey'
                        ),
                        'cdmia' => array(
                                'application/cdmi-capability'
                        ),
                        'cdmic' => array(
                                'application/cdmi-container'
                        ),
                        'cdmid' => array(
                                'application/cdmi-domain'
                        ),
                        'cdmio' => array(
                                'application/cdmi-object'
                        ),
                        'cdmiq' => array(
                                'application/cdmi-queue'
                        ),
                        'cdr' => array(
                                'application/cdr',
                                'application/corel-draw',
                                'application/coreldraw',
                                'image/cdr',
                                'zz-application/zz-winassoc-cdr'
                        ),
                        'cdx' => array(
                                'chemical/cdx'
                        ),
                        'cdxml' => array(
                                'application/chemdraw+xml'
                        ),
                        'cdy' => array(
                                'application/cinderella'
                        ),
                        'cea' => array(
                                'application/cea'
                        ),
                        'cer' => array(
                                'application/pkix-cert'
                        ),
                        'cert' => array(
                                'application/x509-ca-cert'
                        ),
                        'cfc' => array(
                                'text/coldfusion',
                                'text/plain'
                        ),
                        'cfg' => array(
                                'text/plain'
                        ),
                        'cfm' => array(
                                'text/coldfusion',
                                'text/plain'
                        ),
                        'cfml' => array(
                                'text/coldfusion',
                                'text/plain'
                        ),
                        'cfs' => array(
                                'application/cfs-compressed'
                        ),
                        'cgb' => array(
                                'application/gameboy-color-rom'
                        ),
                        'cgi' => array(
                                'text/cgi',
                                'text/plain'
                        ),
                        'cgm' => array(
                                'image/cgm'
                        ),
                        'chat' => array(
                                'application/chat'
                        ),
                        'chm' => array(
                                'application/chm',
                                'application/ms-htmlhelp'
                        ),
                        'chrt' => array(
                                'application/kchart',
                                'application/kde.kchart'
                        ),
                        'cif' => array(
                                'application/multiad.creator.cif',
                                'chemical/cif'
                        ),
                        'cii' => array(
                                'application/anser-web-certificate-issue-initiation'
                        ),
                        'cil' => array(
                                'application/ms-artgalry'
                        ),
                        'cl' => array(
                                'application/simple-filter+xml',
                                'message/imdn+xml',
                                'text/common-lisp',
                                'text/csrc',
                                'text/opencl-src',
                                'text/plain'
                        ),
                        'cla' => array(
                                'application/claymore'
                        ),
                        'class' => array(
                                'application/dvb.dvbj',
                                'application/java',
                                'application/java-byte-code',
                                'application/java-class',
                                'application/java-vm'
                        ),
                        'classpath' => array(
                                'text/plain'
                        ),
                        'clj' => array(
                                'text/clojure',
                                'text/plain'
                        ),
                        'clkk' => array(
                                'application/crick.clicker.keyboard'
                        ),
                        'clkp' => array(
                                'application/crick.clicker.palette'
                        ),
                        'clkt' => array(
                                'application/crick.clicker.template'
                        ),
                        'clkw' => array(
                                'application/crick.clicker.wordbank'
                        ),
                        'clkx' => array(
                                'application/crick.clicker'
                        ),
                        'clp' => array(
                                'application/msclip'
                        ),
                        'clpi' => array(
                                'video/mp2t'
                        ),
                        'cls' => array(
                                'application/tex',
                                'text/basic',
                                'text/plain',
                                'text/tex',
                                'text/vbasic'
                        ),
                        'clue' => array(
                                'application/clueinfo+xml'
                        ),
                        'cmake' => array(
                                'text/cmake',
                                'text/plain'
                        ),
                        'cmc' => array(
                                'application/cosmocaller'
                        ),
                        'cmd' => array(
                                'application/bat',
                                'text/plain'
                        ),
                        'cmdf' => array(
                                'chemical/cmdf'
                        ),
                        'cml' => array(
                                'chemical/cml'
                        ),
                        'cmp' => array(
                                'application/yellowriver-custom-menu'
                        ),
                        'cmsc' => array(
                                'application/cms'
                        ),
                        'cmx' => array(
                                'image/cmx'
                        ),
                        'cnd' => array(
                                'text/jcr-cnd'
                        ),
                        'cob' => array(
                                'text/cobol',
                                'text/plain'
                        ),
                        'cod' => array(
                                'application/rim.cod'
                        ),
                        'coffee' => array(
                                'application/coffeescript',
                                'text/coffeescript',
                                'text/plain'
                        ),
                        'com' => array(
                                'application/msdownload'
                        ),
                        'conf' => array(
                                'text/plain'
                        ),
                        'config' => array(
                                'text/plain'
                        ),
                        'core' => array(
                                'application/core'
                        ),
                        'cpi' => array(
                                'video/mp2t'
                        ),
                        'cpio' => array(
                                'application/cpio'
                        ),
                        'cpkg' => array(
                                'application/xmpie.cpkg'
                        ),
                        'cpl' => array(
                                'application/cpl+xml'
                        ),
                        'cpp' => array(
                                'text/c',
                                'text/c++src',
                                'text/csrc',
                                'text/plain'
                        ),
                        'cpt' => array(
                                'application/mac-compactpro',
                                'audio/dts'
                        ),
                        'cr2' => array(
                                'image/canon-cr2',
                                'image/dcraw',
                                'image/raw-canon'
                        ),
                        'crd' => array(
                                'application/mscardfile'
                        ),
                        'crdownload' => array(
                                'application/partial-download'
                        ),
                        'crl' => array(
                                'application/pkix-crl'
                        ),
                        'crt' => array(
                                'application/x509-ca-cert'
                        ),
                        'crtr' => array(
                                'application/multiad.creator'
                        ),
                        'crw' => array(
                                'image/canon-crw',
                                'image/dcraw',
                                'image/raw-canon'
                        ),
                        'crx' => array(
                                'application/chrome-package'
                        ),
                        'cryptonote' => array(
                                'application/rig.cryptonote'
                        ),
                        'cs' => array(
                                'text/csharp',
                                'text/csrc',
                                'text/plain'
                        ),
                        'csh' => array(
                                'application/csh',
                                'application/shellscript'
                        ),
                        'csl' => array(
                                'application/citationstyles.style+xml'
                        ),
                        'csml' => array(
                                'chemical/csml'
                        ),
                        'csp' => array(
                                'application/commonspace'
                        ),
                        'csrattrs' => array(
                                'application/csrattrs'
                        ),
                        'css' => array(
                                'text/css',
                                'text/plain'
                        ),
                        'cst' => array(
                                'application/commonspace',
                                'application/director'
                        ),
                        'csv' => array(
                                'text/comma-separated-values',
                                'text/csv',
                                'text/plain'
                        ),
                        'csvs' => array(
                                'text/csv-schema',
                                'text/plain'
                        ),
                        'cu' => array(
                                'application/cu-seeme'
                        ),
                        'cuc' => array(
                                'application/tamp-community-update-confirm'
                        ),
                        'cue' => array(
                                'application/cue',
                                'text/plain'
                        ),
                        'cur' => array(
                                'image/win-bitmap'
                        ),
                        'curl' => array(
                                'application/vnd-curl',
                                'text/curl',
                                'text/vnd-curl'
                        ),
                        'cw' => array(
                                'application/prs.cww'
                        ),
                        'cwiki' => array(
                                'text/plain'
                        ),
                        'cwk' => array(
                                'application/appleworks'
                        ),
                        'cww' => array(
                                'application/prs.cww'
                        ),
                        'cxt' => array(
                                'application/director'
                        ),
                        'cxx' => array(
                                'text/c',
                                'text/c++src',
                                'text/csrc',
                                'text/plain'
                        ),
                        'dae' => array(
                                'model/collada+xml'
                        ),
                        'daf' => array(
                                'application/mobius.daf'
                        ),
                        'dar' => array(
                                'application/dar'
                        ),
                        'dart' => array(
                                'application/dart',
                                'application/vnd-dart'
                        ),
                        'data' => array(
                                'text/plain'
                        ),
                        'dataless' => array(
                                'application/fdsn.mseed',
                                'application/fdsn.seed'
                        ),
                        'davmount' => array(
                                'application/davmount+xml'
                        ),
                        'dbase' => array(
                                'application/dbf'
                        ),
                        'dbase3' => array(
                                'application/dbf'
                        ),
                        'dbf' => array(
                                'application/dbase',
                                'application/dbf'
                        ),
                        'dbk' => array(
                                'application/docbook+xml',
                                'application/oasis.docbook+xml',
                                'application/xml'
                        ),
                        'dc' => array(
                                'application/dc-rom'
                        ),
                        'dcd' => array(
                                'application/dcd'
                        ),
                        'dcl' => array(
                                'text/dcl',
                                'text/plain'
                        ),
                        'dcm' => array(
                                'application/dicom'
                        ),
                        'dcr' => array(
                                'application/director',
                                'image/dcraw',
                                'image/kodak-dcr'
                        ),
                        'dcs' => array(
                                'image/raw-kodak'
                        ),
                        'dcurl' => array(
                                'text/curl.dcurl'
                        ),
                        'dcx' => array(
                                'image/dcx',
                                'image/zbrush.dcx'
                        ),
                        'dd2' => array(
                                'application/oma.dd2+xml'
                        ),
                        'ddd' => array(
                                'application/fujixerox.ddd'
                        ),
                        'ddf' => array(
                                'application/syncml.dmddf+wbxml',
                                'application/syncml.dmddf+xml'
                        ),
                        'dds' => array(
                                'image/dds'
                        ),
                        'deb' => array(
                                'application/archive',
                                'application/deb',
                                'application/debian-package',
                                'application/debian.binary-package',
                                'application/octet-stream'
                        ),
                        'def' => array(
                                'text/plain'
                        ),
                        'deploy' => array(
                                'application/octet-stream'
                        ),
                        'der' => array(
                                'application/x509-ca-cert'
                        ),
                        'desktop' => array(
                                'application/desktop',
                                'application/gnome-app-info',
                                'text/plain'
                        ),
                        'device' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'dex' => array(
                                'application/dex'
                        ),
                        'dfac' => array(
                                'application/dreamfactory'
                        ),
                        'dgc' => array(
                                'application/dgc-compressed'
                        ),
                        'di' => array(
                                'text/csrc',
                                'text/dsrc'
                        ),
                        'dia' => array(
                                'application/dia-diagram',
                                'application/xml'
                        ),
                        'dib' => array(
                                'image/bmp',
                                'image/ms-bmp'
                        ),
                        'dic' => array(
                                'text/c'
                        ),
                        'dicomdir' => array(
                                'application/dicom'
                        ),
                        'dif' => array(
                                'application/dif+xml',
                                'application/xml'
                        ),
                        'diff' => array(
                                'text/diff',
                                'text/patch',
                                'text/plain'
                        ),
                        'dii' => array(
                                'application/dii'
                        ),
                        'dim' => array(
                                'application/fastcopy-disk-image'
                        ),
                        'dir' => array(
                                'application/director'
                        ),
                        'dis' => array(
                                'application/mobius.dis'
                        ),
                        'disposition-notification' => array(
                                'message/disposition-notification'
                        ),
                        'dist' => array(
                                'application/apple.installer+xml',
                                'application/octet-stream'
                        ),
                        'distz' => array(
                                'application/apple.installer+xml',
                                'application/octet-stream'
                        ),
                        'dit' => array(
                                'application/dit'
                        ),
                        'dita' => array(
                                'application/dita+xml',
                                'application/dita+xmlformattopic'
                        ),
                        'ditamap' => array(
                                'application/dita+xml',
                                'application/dita+xmlformatmap'
                        ),
                        'ditaval' => array(
                                'application/dita+xml',
                                'application/dita+xmlformatval'
                        ),
                        'dive' => array(
                                'application/patentdive'
                        ),
                        'divx' => array(
                                'video/avi',
                                'video/divx',
                                'video/msvideo'
                        ),
                        'djv' => array(
                                'image/djvu',
                                'image/djvu+multipage',
                                'image/vnd-djvu',
                                'image/x.djvu'
                        ),
                        'djvu' => array(
                                'image/djvu',
                                'image/djvu+multipage',
                                'image/vnd-djvu',
                                'image/x.djvu'
                        ),
                        'dll' => array(
                                'application/msdownload',
                                'application/octet-stream'
                        ),
                        'dmg' => array(
                                'application/apple-diskimage',
                                'application/octet-stream'
                        ),
                        'dmp' => array(
                                'application/pcap',
                                'application/tcpdump.pcap'
                        ),
                        'dms' => array(
                                'application/octet-stream',
                                'text/dmclientscript'
                        ),
                        'dna' => array(
                                'application/dna'
                        ),
                        'dng' => array(
                                'image/adobe-dng',
                                'image/dcraw',
                                'image/raw-adobe'
                        ),
                        'do' => array(
                                'application/stata-do'
                        ),
                        'doc' => array(
                                'application/ms-office',
                                'application/ms-word',
                                'application/msword',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-doc'
                        ),
                        'docbook' => array(
                                'application/docbook+xml',
                                'application/oasis.docbook+xml',
                                'application/xml'
                        ),
                        'docjson' => array(
                                'application/document+json'
                        ),
                        'docm' => array(
                                'application/ms-word.document.macroenabled.12',
                                'application/openxmlformats-officedocument.wordprocessingml.document',
                                'application/tika-ooxml'
                        ),
                        'docx' => array(
                                'application/openxmlformats-officedocument.wordprocessingml.document',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'dor' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'dot' => array(
                                'application/ms-office',
                                'application/ms-word',
                                'application/msword',
                                'application/msword-template',
                                'application/tika-msoffice',
                                'application/xml',
                                'text/graphviz'
                        ),
                        'dotm' => array(
                                'application/ms-word.template.macroenabled.12',
                                'application/openxmlformats-officedocument.wordprocessingml.template',
                                'application/tika-ooxml'
                        ),
                        'dotx' => array(
                                'application/openxmlformats-officedocument.wordprocessingml-template',
                                'application/openxmlformats-officedocument.wordprocessingml.template',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'dp' => array(
                                'application/osgi.dp'
                        ),
                        'dpg' => array(
                                'application/dpgraph'
                        ),
                        'dpkg' => array(
                                'application/xmpie.dpkg',
                                'application/xmpie.plan'
                        ),
                        'dpr' => array(
                                'text/pascal',
                                'text/plain'
                        ),
                        'dra' => array(
                                'audio/dra'
                        ),
                        'drc' => array(
                                'video/dirac',
                                'video/ogg'
                        ),
                        'drf' => array(
                                'image/raw-kodak'
                        ),
                        'drle' => array(
                                'image/dicom-rle'
                        ),
                        'dsc' => array(
                                'text/prs.lines.tag'
                        ),
                        'dsl' => array(
                                'text/dsl',
                                'text/plain'
                        ),
                        'dssc' => array(
                                'application/dssc+der'
                        ),
                        'dta' => array(
                                'application/stata-dta'
                        ),
                        'dtb' => array(
                                'application/dtbook+xml'
                        ),
                        'dtd' => array(
                                'application/xml-dtd',
                                'text/dtd',
                                'text/plain'
                        ),
                        'dts' => array(
                                'audio/dts'
                        ),
                        'dtshd' => array(
                                'audio/dts',
                                'audio/dts.hd',
                                'audio/dtshd'
                        ),
                        'dtx' => array(
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'dump' => array(
                                'application/octet-stream'
                        ),
                        'dv' => array(
                                'video/dv'
                        ),
                        'dvb' => array(
                                'video/dvb.file'
                        ),
                        'dvc' => array(
                                'application/dvcs'
                        ),
                        'dvi' => array(
                                'application/dvi'
                        ),
                        'dwf' => array(
                                'drawing/dwf',
                                'model/dwf',
                                'model/vnd-dwf'
                        ),
                        'dwfx' => array(
                                'application/tika-ooxml',
                                'model/dwfx+xps'
                        ),
                        'dwg' => array(
                                'application/acad',
                                'application/autocad',
                                'application/autocaddwg',
                                'application/dwg',
                                'drawing/dwg',
                                'image/dwg'
                        ),
                        'dxb' => array(
                                'image/dxb'
                        ),
                        'dxf' => array(
                                'image/dxf'
                        ),
                        'dxp' => array(
                                'application/spotfire.dxp'
                        ),
                        'dxr' => array(
                                'application/director',
                                'application/vnd-dxr'
                        ),
                        'dzr' => array(
                                'application/dzr'
                        ),
                        'ear' => array(
                                'application/java-archive',
                                'application/tika-java-enterprise-archive'
                        ),
                        'ecelp4800' => array(
                                'audio/nuera.ecelp4800'
                        ),
                        'ecelp7470' => array(
                                'audio/nuera.ecelp7470'
                        ),
                        'ecelp9600' => array(
                                'audio/nuera.ecelp9600'
                        ),
                        'ecig' => array(
                                'application/evolv.ecig.settings'
                        ),
                        'ecigprofile' => array(
                                'application/evolv.ecig.profile'
                        ),
                        'ecigtheme' => array(
                                'application/evolv.ecig.theme'
                        ),
                        'ecma' => array(
                                'application/ecmascript'
                        ),
                        'edm' => array(
                                'application/novadigm.edm'
                        ),
                        'edx' => array(
                                'application/novadigm.edx'
                        ),
                        'efif' => array(
                                'application/picsel'
                        ),
                        'egon' => array(
                                'application/egon'
                        ),
                        'egrm' => array(
                                'text/plain'
                        ),
                        'ei6' => array(
                                'application/pg.osasli'
                        ),
                        'eif' => array(
                                'text/eiffel',
                                'text/plain'
                        ),
                        'el' => array(
                                'text/emacs-lisp',
                                'text/plain'
                        ),
                        'elc' => array(
                                'application/elc',
                                'application/octet-stream'
                        ),
                        'emf' => array(
                                'application/emf',
                                'application/msmetafile',
                                'image/emf'
                        ),
                        'eml' => array(
                                'message/rfc822',
                                'text/plain',
                                'text/tika-text-based-message'
                        ),
                        'emlx' => array(
                                'message/emlx',
                                'text/tika-text-based-message'
                        ),
                        'emm' => array(
                                'application/ibm.electronic-media'
                        ),
                        'emma' => array(
                                'application/emma+xml'
                        ),
                        'emotionml' => array(
                                'application/emotionml+xml'
                        ),
                        'emp' => array(
                                'application/emusic-emusicpackage'
                        ),
                        'emz' => array(
                                'application/gzip',
                                'application/ms-emz',
                                'application/msmetafile',
                                'image/emf-compressed'
                        ),
                        'enr' => array(
                                'application/endnote-refer'
                        ),
                        'ent' => array(
                                'application/nervana',
                                'application/xml',
                                'application/xml-external-parsed-entity',
                                'text/plain',
                                'text/xml-external-parsed-entity'
                        ),
                        'entity' => array(
                                'application/nervana'
                        ),
                        'enw' => array(
                                'application/endnote-refer'
                        ),
                        'eol' => array(
                                'audio/digital-winds'
                        ),
                        'eot' => array(
                                'application/ms-fontobject'
                        ),
                        'ep' => array(
                                'application/bluetooth.ep.oob'
                        ),
                        'eps' => array(
                                'application/postscript',
                                'image/eps'
                        ),
                        'epsf' => array(
                                'application/postscript',
                                'image/eps'
                        ),
                        'epsi' => array(
                                'application/postscript',
                                'image/eps'
                        ),
                        'epub' => array(
                                'application/epub+zip',
                                'application/zip'
                        ),
                        'erf' => array(
                                'image/raw-epson'
                        ),
                        'erl' => array(
                                'text/erlang',
                                'text/plain'
                        ),
                        'es' => array(
                                'application/ecmascript',
                                'application/executable',
                                'text/ecmascript'
                        ),
                        'es3' => array(
                                'application/eszigno3+xml'
                        ),
                        'esa' => array(
                                'application/osgi.subsystem'
                        ),
                        'esf' => array(
                                'application/epson.esf'
                        ),
                        'espass' => array(
                                'application/espass-espass+zip'
                        ),
                        'et3' => array(
                                'application/eszigno3+xml'
                        ),
                        'etheme' => array(
                                'application/e-theme'
                        ),
                        'etx' => array(
                                'text/plain',
                                'text/setext'
                        ),
                        'eva' => array(
                                'application/eva'
                        ),
                        'evy' => array(
                                'application/envoy'
                        ),
                        'exe' => array(
                                'application/dosexec',
                                'application/ms-dos-executable',
                                'application/msdownload',
                                'application/octet-stream'
                        ),
                        'exi' => array(
                                'application/exi'
                        ),
                        'exp' => array(
                                'text/expect',
                                'text/plain'
                        ),
                        'explain' => array(
                                'application/octet-stream',
                                'application/zip',
                                'application/zip-compressed'
                        ),
                        'exr' => array(
                                'image/exr'
                        ),
                        'ext' => array(
                                'application/novadigm.ext'
                        ),
                        'ez' => array(
                                'application/andrew-inset'
                        ),
                        'ez2' => array(
                                'application/ezpix-album'
                        ),
                        'ez3' => array(
                                'application/ezpix-package'
                        ),
                        'f' => array(
                                'text/fortran'
                        ),
                        'f4a' => array(
                                'audio/m4a',
                                'audio/mp4'
                        ),
                        'f4b' => array(
                                'audio/m4b',
                                'audio/mp4'
                        ),
                        'f4v' => array(
                                'video/f4v',
                                'video/m4v',
                                'video/mp4',
                                'video/mp4v-es'
                        ),
                        'f77' => array(
                                'text/fortran',
                                'text/plain'
                        ),
                        'f90' => array(
                                'text/fortran',
                                'text/plain'
                        ),
                        'f95' => array(
                                'text/fortran',
                                'text/plain'
                        ),
                        'fb2' => array(
                                'application/fictionbook',
                                'application/fictionbook+xml',
                                'application/xml'
                        ),
                        'fbs' => array(
                                'image/fastbidsheet'
                        ),
                        'fcdt' => array(
                                'application/adobe.formscentral.fcdt'
                        ),
                        'fcs' => array(
                                'application/isac.fcs'
                        ),
                        'fdf' => array(
                                'application/fdf'
                        ),
                        'fds' => array(
                                'application/fds-disk'
                        ),
                        'fe_launch' => array(
                                'application/denovo.fcselayout-link'
                        ),
                        'feature' => array(
                                'text/gherkin',
                                'text/plain'
                        ),
                        'fff' => array(
                                'image/raw-imacon'
                        ),
                        'fg5' => array(
                                'application/fujitsu.oasysgp'
                        ),
                        'fgd' => array(
                                'application/director'
                        ),
                        'fh' => array(
                                'image/freehand'
                        ),
                        'fh10' => array(
                                'image/freehand'
                        ),
                        'fh11' => array(
                                'image/freehand'
                        ),
                        'fh12' => array(
                                'image/freehand'
                        ),
                        'fh4' => array(
                                'image/freehand'
                        ),
                        'fh40' => array(
                                'image/freehand'
                        ),
                        'fh5' => array(
                                'image/freehand'
                        ),
                        'fh50' => array(
                                'image/freehand'
                        ),
                        'fh7' => array(
                                'image/freehand'
                        ),
                        'fh8' => array(
                                'image/freehand'
                        ),
                        'fh9' => array(
                                'image/freehand'
                        ),
                        'fhc' => array(
                                'image/freehand'
                        ),
                        'fig' => array(
                                'application/xfig',
                                'image/xfig'
                        ),
                        'finf' => array(
                                'application/fastinfoset'
                        ),
                        'fit' => array(
                                'application/fits'
                        ),
                        'fits' => array(
                                'application/fits',
                                'image/fits'
                        ),
                        'fl' => array(
                                'application/fluid',
                                'text/plain'
                        ),
                        'fla' => array(
                                'application/dtg.local.flash'
                        ),
                        'flac' => array(
                                'audio/flac'
                        ),
                        'flatpak' => array(
                                'application/flatpak',
                                'application/xdgapp'
                        ),
                        'flatpakref' => array(
                                'application/flatpak.ref',
                                'text/plain'
                        ),
                        'flatpakrepo' => array(
                                'application/flatpak.repo',
                                'text/plain'
                        ),
                        'flc' => array(
                                'video/flc',
                                'video/fli',
                                'video/flic'
                        ),
                        'fli' => array(
                                'video/fli',
                                'video/flic'
                        ),
                        'flo' => array(
                                'application/micrografx.flo'
                        ),
                        'flv' => array(
                                'application/flash-video',
                                'flv-application/octet-stream',
                                'video/flv'
                        ),
                        'flw' => array(
                                'application/kde.kivio',
                                'application/kivio'
                        ),
                        'flx' => array(
                                'text/fmi.flexstor'
                        ),
                        'fly' => array(
                                'text/fly'
                        ),
                        'fm' => array(
                                'application/frame',
                                'application/framemaker'
                        ),
                        'fn' => array(
                                'text/plain'
                        ),
                        'fnc' => array(
                                'application/frogans.fnc'
                        ),
                        'fo' => array(
                                'application/software602.filler.form+xml',
                                'application/xml',
                                'application/xslfo+xml',
                                'text/xsl',
                                'text/xslfo'
                        ),
                        'fodg' => array(
                                'application/oasis.opendocument.graphics-flat-xml',
                                'application/xml'
                        ),
                        'fodp' => array(
                                'application/oasis.opendocument.presentation-flat-xml',
                                'application/xml'
                        ),
                        'fods' => array(
                                'application/oasis.opendocument.spreadsheet-flat-xml',
                                'application/xml'
                        ),
                        'fodt' => array(
                                'application/oasis.opendocument.text-flat-xml',
                                'application/xml'
                        ),
                        'for' => array(
                                'text/fortran',
                                'text/plain'
                        ),
                        'fp7' => array(
                                'application/filemaker'
                        ),
                        'fpx' => array(
                                'image/fpx'
                        ),
                        'frame' => array(
                                'application/framemaker'
                        ),
                        'frm' => array(
                                'application/ufdl',
                                'application/xfdl',
                                'text/basic',
                                'text/vbasic'
                        ),
                        'fsc' => array(
                                'application/fsc.weblaunch'
                        ),
                        'fst' => array(
                                'image/fst'
                        ),
                        'ft' => array(
                                'text/plain'
                        ),
                        'ft10' => array(
                                'image/freehand'
                        ),
                        'ft11' => array(
                                'image/freehand'
                        ),
                        'ft12' => array(
                                'image/freehand'
                        ),
                        'ft7' => array(
                                'image/freehand'
                        ),
                        'ft8' => array(
                                'image/freehand'
                        ),
                        'ft9' => array(
                                'image/freehand'
                        ),
                        'ftc' => array(
                                'application/fluxtime.clip'
                        ),
                        'fti' => array(
                                'application/anser-web-funds-transfer-initiation'
                        ),
                        'fts' => array(
                                'application/fits'
                        ),
                        'fv' => array(
                                'text/plain'
                        ),
                        'fvt' => array(
                                'video/fvt'
                        ),
                        'fxm' => array(
                                'video/flv',
                                'video/javafx'
                        ),
                        'fxp' => array(
                                'application/adobe.fxp'
                        ),
                        'fxpl' => array(
                                'application/adobe.fxp'
                        ),
                        'fzs' => array(
                                'application/fuzzysheet'
                        ),
                        'g2w' => array(
                                'application/geoplan'
                        ),
                        'g3' => array(
                                'application/geocube+xml',
                                'image/fax-g3',
                                'image/g3fax'
                        ),
                        'g3w' => array(
                                'application/geospace'
                        ),
                        'gac' => array(
                                'application/groove-account'
                        ),
                        'gam' => array(
                                'application/tads'
                        ),
                        'gb' => array(
                                'application/gameboy-rom'
                        ),
                        'gba' => array(
                                'application/gba-rom'
                        ),
                        'gbc' => array(
                                'application/gameboy-color-rom'
                        ),
                        'gbr' => array(
                                'application/gerber',
                                'application/rpki-ghostbusters',
                                'application/rs-274x',
                                'image/gimp-gbr'
                        ),
                        'gca' => array(
                                'application/gca-compressed'
                        ),
                        'gcode' => array(
                                'text/plain',
                                'text/x.gcode'
                        ),
                        'gcrd' => array(
                                'text/directory',
                                'text/plain',
                                'text/vcard'
                        ),
                        'gdl' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'ged' => array(
                                'application/gedcom',
                                'text/gedcom'
                        ),
                        'gedcom' => array(
                                'application/gedcom',
                                'text/gedcom'
                        ),
                        'gem' => array(
                                'application/gtar',
                                'application/tar'
                        ),
                        'gen' => array(
                                'application/genesis-rom'
                        ),
                        'generally' => array(
                                'text/fmi.flexstor'
                        ),
                        'geo' => array(
                                'application/dynageo'
                        ),
                        'geojson' => array(
                                'application/geo+json',
                                'application/json'
                        ),
                        'gex' => array(
                                'application/geometry-explorer'
                        ),
                        'gf' => array(
                                'application/tex-gf'
                        ),
                        'gg' => array(
                                'application/gamegear-rom'
                        ),
                        'ggb' => array(
                                'application/geogebra.file'
                        ),
                        'ggt' => array(
                                'application/geogebra.tool'
                        ),
                        'ghf' => array(
                                'application/groove-help'
                        ),
                        'gif' => array(
                                'image/gif'
                        ),
                        'gih' => array(
                                'image/gimp-gih'
                        ),
                        'gim' => array(
                                'application/groove-identity-message'
                        ),
                        'glade' => array(
                                'application/glade',
                                'application/xml'
                        ),
                        'gltf' => array(
                                'model/gltf+json'
                        ),
                        'gml' => array(
                                'application/gml+xml',
                                'application/xml'
                        ),
                        'gmo' => array(
                                'application/gettext-translation'
                        ),
                        'gmx' => array(
                                'application/gmx'
                        ),
                        'gnc' => array(
                                'application/gnucash'
                        ),
                        'gnd' => array(
                                'application/gnunet-directory'
                        ),
                        'gnucash' => array(
                                'application/gnucash'
                        ),
                        'gnumeric' => array(
                                'application/gnumeric',
                                'application/gnumeric-spreadsheet'
                        ),
                        'gnuplot' => array(
                                'application/gnuplot',
                                'text/plain'
                        ),
                        'go' => array(
                                'text/go',
                                'text/plain'
                        ),
                        'gp' => array(
                                'application/gnuplot',
                                'text/plain'
                        ),
                        'gpg' => array(
                                'application/pgp',
                                'application/pgp-encrypted',
                                'application/pgp-keys',
                                'application/pgp-signature',
                                'text/plain'
                        ),
                        'gph' => array(
                                'application/flographit'
                        ),
                        'gplt' => array(
                                'application/gnuplot',
                                'text/plain'
                        ),
                        'gpx' => array(
                                'application/gpx',
                                'application/gpx+xml',
                                'application/xml'
                        ),
                        'gqf' => array(
                                'application/grafeq'
                        ),
                        'gqs' => array(
                                'application/grafeq'
                        ),
                        'gra' => array(
                                'application/graphite'
                        ),
                        'gram' => array(
                                'application/srgs'
                        ),
                        'gramps' => array(
                                'application/gramps-xml'
                        ),
                        'grb' => array(
                                'application/grib'
                        ),
                        'grb1' => array(
                                'application/grib'
                        ),
                        'grb2' => array(
                                'application/grib'
                        ),
                        'gre' => array(
                                'application/geometry-explorer'
                        ),
                        'grm' => array(
                                'text/plain'
                        ),
                        'groovy' => array(
                                'text/groovy',
                                'text/plain'
                        ),
                        'grv' => array(
                                'application/groove-injector'
                        ),
                        'grxml' => array(
                                'application/srgs+xml'
                        ),
                        'gs' => array(
                                'text/genie',
                                'text/plain'
                        ),
                        'gsf' => array(
                                'application/font-ghostscript',
                                'application/font-type1',
                                'application/postscript'
                        ),
                        'gsm' => array(
                                'audio/gsm',
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'gtar' => array(
                                'application/gtar',
                                'application/tar'
                        ),
                        'gtm' => array(
                                'application/groove-tool-message'
                        ),
                        'gtw' => array(
                                'model/gtw'
                        ),
                        'gv' => array(
                                'text/graphviz',
                                'text/plain'
                        ),
                        'gvp' => array(
                                'text/google-video-pointer'
                        ),
                        'gxf' => array(
                                'application/gxf'
                        ),
                        'gxt' => array(
                                'application/geonext'
                        ),
                        'gz' => array(
                                'application/gunzip',
                                'application/gzip',
                                'application/gzip-compressed',
                                'application/gzipped',
                                'gzip/document'
                        ),
                        'h' => array(
                                'text/c'
                        ),
                        'h261' => array(
                                'video/h261'
                        ),
                        'h263' => array(
                                'video/h263'
                        ),
                        'h264' => array(
                                'video/h264'
                        ),
                        'h4' => array(
                                'application/hdf'
                        ),
                        'h5' => array(
                                'application/hdf'
                        ),
                        'hal' => array(
                                'application/hal+xml'
                        ),
                        'haml' => array(
                                'text/haml',
                                'text/plain'
                        ),
                        'hbci' => array(
                                'application/hbci'
                        ),
                        'hdf' => array(
                                'application/hdf'
                        ),
                        'hdf4' => array(
                                'application/hdf'
                        ),
                        'hdf5' => array(
                                'application/hdf'
                        ),
                        'hdr' => array(
                                'image/radiance'
                        ),
                        'hdt' => array(
                                'application/hdt'
                        ),
                        'he5' => array(
                                'application/hdf'
                        ),
                        'heldxml' => array(
                                'application/held+xml'
                        ),
                        'hfa' => array(
                                'application/erdas-hfa'
                        ),
                        'hfe' => array(
                                'application/hfe-floppy-image'
                        ),
                        'hh' => array(
                                'text/c',
                                'text/c++hdr',
                                'text/chdr',
                                'text/plain'
                        ),
                        'hlp' => array(
                                'application/winhlp',
                                'zz-application/zz-winassoc-hlp'
                        ),
                        'hp' => array(
                                'text/c++hdr',
                                'text/chdr',
                                'text/plain'
                        ),
                        'hpgl' => array(
                                'application/hp-hpgl'
                        ),
                        'hpi' => array(
                                'application/hp-hpid'
                        ),
                        'hpid' => array(
                                'application/hp-hpid'
                        ),
                        'hpp' => array(
                                'text/c++hdr',
                                'text/chdr',
                                'text/plain'
                        ),
                        'hps' => array(
                                'application/hp-hps'
                        ),
                        'hpub' => array(
                                'application/prs.hpub+zip'
                        ),
                        'hqx' => array(
                                'application/binhex',
                                'application/mac-binhex',
                                'application/mac-binhex40'
                        ),
                        'hs' => array(
                                'text/haskell',
                                'text/plain'
                        ),
                        'htaccess' => array(
                                'text/plain'
                        ),
                        'htc' => array(
                                'text/component'
                        ),
                        'htke' => array(
                                'application/kenameaapp'
                        ),
                        'htm' => array(
                                'text/html',
                                'text/plain'
                        ),
                        'html' => array(
                                'application/dtg.local-html',
                                'text/html',
                                'text/plain'
                        ),
                        'hvd' => array(
                                'application/yamaha.hv-dic'
                        ),
                        'hvp' => array(
                                'application/yamaha.hv-voice'
                        ),
                        'hvs' => array(
                                'application/yamaha.hv-script'
                        ),
                        'hwp' => array(
                                'application/haansoft-hwp',
                                'application/hwp'
                        ),
                        'hwt' => array(
                                'application/haansoft-hwt',
                                'application/hwt'
                        ),
                        'hx' => array(
                                'text/haxe',
                                'text/plain'
                        ),
                        'hxx' => array(
                                'text/c++hdr',
                                'text/chdr',
                                'text/plain'
                        ),
                        'i2g' => array(
                                'application/intergeo'
                        ),
                        'i3' => array(
                                'text/modula',
                                'text/plain'
                        ),
                        'ibooks' => array(
                                'application/epub+zip',
                                'application/ibooks+zip'
                        ),
                        'ic' => array(
                                'application/commerce-battelle'
                        ),
                        'ica' => array(
                                'application/commerce-battelle',
                                'application/ica',
                                'text/plain'
                        ),
                        'icb' => array(
                                'image/icb',
                                'image/tga'
                        ),
                        'icc' => array(
                                'application/commerce-battelle',
                                'application/iccprofile'
                        ),
                        'icd' => array(
                                'application/commerce-battelle'
                        ),
                        'ice' => array(
                                'x-conference/cooltalk'
                        ),
                        'icf' => array(
                                'application/commerce-battelle'
                        ),
                        'icm' => array(
                                'application/iccprofile'
                        ),
                        'icns' => array(
                                'image/icns'
                        ),
                        'ico' => array(
                                'application/ico',
                                'image/ico',
                                'image/icon',
                                'image/microsoft.icon',
                                'text/ico'
                        ),
                        'ics' => array(
                                'application/ics',
                                'text/calendar',
                                'text/plain',
                                'text/vcalendar'
                        ),
                        'idl' => array(
                                'text/idl',
                                'text/plain'
                        ),
                        'ief' => array(
                                'image/ief'
                        ),
                        'ifb' => array(
                                'text/calendar',
                                'text/plain'
                        ),
                        'iff' => array(
                                'application/iff',
                                'image/iff',
                                'image/ilbm'
                        ),
                        'ifm' => array(
                                'application/shana.informed.formdata'
                        ),
                        'ig' => array(
                                'text/modula',
                                'text/plain'
                        ),
                        'iges' => array(
                                'model/iges',
                                'text/plain'
                        ),
                        'igl' => array(
                                'application/igloader'
                        ),
                        'igm' => array(
                                'application/insors.igm'
                        ),
                        'ign' => array(
                                'application/coreos.ignition+json'
                        ),
                        'ignition' => array(
                                'application/coreos.ignition+json'
                        ),
                        'igs' => array(
                                'model/iges',
                                'text/plain'
                        ),
                        'igx' => array(
                                'application/micrografx-igx',
                                'application/micrografx.igx'
                        ),
                        'ihtml' => array(
                                'text/plain'
                        ),
                        'iif' => array(
                                'application/shana.informed.interchange'
                        ),
                        'iiq' => array(
                                'image/raw-phaseone'
                        ),
                        'ilbm' => array(
                                'application/iff',
                                'image/iff',
                                'image/ilbm'
                        ),
                        'ime' => array(
                                'audio/imelody',
                                'text/imelody'
                        ),
                        'imf' => array(
                                'application/imagemeter.folder+zip'
                        ),
                        'img' => array(
                                'application/octet-stream',
                                'application/raw-disk-image'
                        ),
                        'imgcal' => array(
                                'application/3lightssoftware.imagescal'
                        ),
                        'imi' => array(
                                'application/imagemeter.image+zip'
                        ),
                        'imp' => array(
                                'application/accpac.simply.imp'
                        ),
                        'ims' => array(
                                'application/ms-ims'
                        ),
                        'imscc' => array(
                                'application/ims.imsccv1p2',
                                'application/ims.imsccv1p3'
                        ),
                        'imy' => array(
                                'audio/imelody',
                                'text/imelody'
                        ),
                        'in' => array(
                                'text/plain'
                        ),
                        'indd' => array(
                                'application/adobe-indesign'
                        ),
                        'ini' => array(
                                'text/ini',
                                'text/plain'
                        ),
                        'ink' => array(
                                'application/inkml+xml'
                        ),
                        'inkml' => array(
                                'application/inkml+xml'
                        ),
                        'ins' => array(
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'install' => array(
                                'application/install-instructions'
                        ),
                        'inx' => array(
                                'application/adobe-indesign-interchange',
                                'application/xml'
                        ),
                        'iota' => array(
                                'application/astraea-software.iota'
                        ),
                        'ipa' => array(
                                'application/itunes-ipa',
                                'application/zip'
                        ),
                        'ipfix' => array(
                                'application/ipfix'
                        ),
                        'ipk' => array(
                                'application/shana.informed.package'
                        ),
                        'iptables' => array(
                                'text/iptables',
                                'text/plain'
                        ),
                        'ipynb' => array(
                                'application/ipynb+json',
                                'application/json'
                        ),
                        'irm' => array(
                                'application/ibm.rights-management'
                        ),
                        'irp' => array(
                                'application/irepository.package+xml'
                        ),
                        'ism' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'iso' => array(
                                'application/cd-image',
                                'application/gamecube-iso-image',
                                'application/gamecube-rom',
                                'application/iso9660-image',
                                'application/octet-stream',
                                'application/raw-disk-image',
                                'application/saturn-rom',
                                'application/sega-cd-rom',
                                'application/wbfs',
                                'application/wia',
                                'application/wii-iso-image',
                                'application/wii-rom'
                        ),
                        'iso19139' => array(
                                'application/xml',
                                'text/iso19139+xml'
                        ),
                        'iso9660' => array(
                                'application/cd-image',
                                'application/iso9660-image',
                                'application/raw-disk-image'
                        ),
                        'it' => array(
                                'audio/it'
                        ),
                        'it87' => array(
                                'application/it87',
                                'text/plain'
                        ),
                        'itk' => array(
                                'application/tcl',
                                'text/plain',
                                'text/tcl'
                        ),
                        'itp' => array(
                                'application/shana.informed.formtemplate'
                        ),
                        'its' => array(
                                'application/its+xml'
                        ),
                        'ivp' => array(
                                'application/immervision-ivp'
                        ),
                        'ivu' => array(
                                'application/immervision-ivu'
                        ),
                        'j2c' => array(
                                'image/jp2-codestream'
                        ),
                        'j2k' => array(
                                'image/jp2-codestream'
                        ),
                        'jad' => array(
                                'text/sun.j2me.app-descriptor'
                        ),
                        'jam' => array(
                                'application/jam'
                        ),
                        'jar' => array(
                                'application/jar',
                                'application/java-archive',
                                'application/osgi.bundle',
                                'application/zip'
                        ),
                        'jardiff' => array(
                                'application/java-archive-diff'
                        ),
                        'java' => array(
                                'text/csrc',
                                'text/java',
                                'text/java-source',
                                'text/plain'
                        ),
                        'jb2' => array(
                                'image/jb2',
                                'image/jbig2'
                        ),
                        'jbig2' => array(
                                'image/jb2',
                                'image/jbig2'
                        ),
                        'jceks' => array(
                                'application/java-jce-keystore'
                        ),
                        'jfi' => array(
                                'image/jpeg'
                        ),
                        'jfif' => array(
                                'image/jpeg'
                        ),
                        'jif' => array(
                                'image/jpeg'
                        ),
                        'jisp' => array(
                                'application/jisp'
                        ),
                        'jks' => array(
                                'application/java-keystore'
                        ),
                        'jl' => array(
                                'text/common-lisp',
                                'text/plain'
                        ),
                        'jls' => array(
                                'image/jls'
                        ),
                        'jlt' => array(
                                'application/hp-jlyt'
                        ),
                        'jmx' => array(
                                'text/plain'
                        ),
                        'jng' => array(
                                'image/jng',
                                'video/jng'
                        ),
                        'jnilib' => array(
                                'application/java-jnilib'
                        ),
                        'jnlp' => array(
                                'application/java-jnlp-file',
                                'application/xml'
                        ),
                        'joda' => array(
                                'application/joost.joda-archive'
                        ),
                        'jp2' => array(
                                'image/jp2',
                                'image/jp2-container',
                                'image/jpeg2000',
                                'image/jpeg2000-image',
                                'image/jpx'
                        ),
                        'jpc' => array(
                                'image/jp2-codestream'
                        ),
                        'jpe' => array(
                                'image/jpeg',
                                'image/pjpeg'
                        ),
                        'jpeg' => array(
                                'image/jpeg',
                                'image/pjpeg'
                        ),
                        'jpf' => array(
                                'image/jp2',
                                'image/jp2-container',
                                'image/jpeg2000',
                                'image/jpeg2000-image',
                                'image/jpx'
                        ),
                        'jpg' => array(
                                'image/jpeg',
                                'image/pjpeg'
                        ),
                        'jpg2' => array(
                                'image/jp2',
                                'image/jpeg2000',
                                'image/jpeg2000-image'
                        ),
                        'jpgm' => array(
                                'image/jp2-container',
                                'image/jpm',
                                'video/jpm'
                        ),
                        'jpgv' => array(
                                'video/jpeg'
                        ),
                        'jpm' => array(
                                'image/jp2-container',
                                'image/jpm',
                                'video/jpm'
                        ),
                        'jpr' => array(
                                'application/jbuilder-project'
                        ),
                        'jpx' => array(
                                'application/jbuilder-project',
                                'image/jp2',
                                'image/jpeg2000',
                                'image/jpeg2000-image',
                                'image/jpx'
                        ),
                        'jrd' => array(
                                'application/jrd+json',
                                'application/json'
                        ),
                        'js' => array(
                                'application/ecmascript',
                                'application/javascript',
                                'text/javascript',
                                'text/plain'
                        ),
                        'jsm' => array(
                                'application/ecmascript',
                                'application/javascript',
                                'text/javascript'
                        ),
                        'json' => array(
                                'application/api+json',
                                'application/avalon+json',
                                'application/bekitzur-stech+json',
                                'application/capasystems-pg+json',
                                'application/collection+json',
                                'application/collection.doc+json',
                                'application/collection.next+json',
                                'application/csvm+json',
                                'application/datapackage+json',
                                'application/dataresource+json',
                                'application/dicom+json',
                                'application/drive+json',
                                'application/geo+json',
                                'application/hal+json',
                                'application/hc+json',
                                'application/heroku+json',
                                'application/hyper-item+json',
                                'application/hyperdrive+json',
                                'application/ims.lis.v2.result+json',
                                'application/ims.lti.v2.toolconsumerprofile+json',
                                'application/ims.lti.v2.toolproxy+json',
                                'application/ims.lti.v2.toolproxy.id+json',
                                'application/ims.lti.v2.toolsettings+json',
                                'application/ims.lti.v2.toolsettings.simple+json',
                                'application/infotech.project',
                                'application/javascript',
                                'application/jf2feed+json',
                                'application/json',
                                'application/mason+json',
                                'application/micro+json',
                                'application/miele+json',
                                'application/nearst.inv+json',
                                'application/oftn.l10n+json',
                                'application/oracle.resource+json',
                                'application/siren+json',
                                'application/tableschema+json',
                                'application/vel+json',
                                'application/webpush-options+json',
                                'application/xacml+json'
                        ),
                        'json-patch' => array(
                                'application/json',
                                'application/json-patch+json'
                        ),
                        'jsonld' => array(
                                'application/ims.lis.v2.result+json',
                                'application/ims.lti.v2.toolconsumerprofile+json',
                                'application/ims.lti.v2.toolproxy+json',
                                'application/ims.lti.v2.toolproxy.id+json',
                                'application/ims.lti.v2.toolsettings+json',
                                'application/ims.lti.v2.toolsettings.simple+json',
                                'application/json',
                                'application/ld+json'
                        ),
                        'jsonml' => array(
                                'application/jsonml+json'
                        ),
                        'jsp' => array(
                                'application/httpd-jsp',
                                'text/jsp',
                                'text/plain'
                        ),
                        'jtd' => array(
                                'text/esmertec.theme-descriptor'
                        ),
                        'junit' => array(
                                'text/plain'
                        ),
                        'jx' => array(
                                'text/plain'
                        ),
                        'k25' => array(
                                'image/dcraw',
                                'image/kodak-k25',
                                'image/raw-kodak'
                        ),
                        'k7' => array(
                                'application/thomson-cassette'
                        ),
                        'kar' => array(
                                'audio/midi'
                        ),
                        'karbon' => array(
                                'application/karbon',
                                'application/kde.karbon'
                        ),
                        'kcm' => array(
                                'application/nervana'
                        ),
                        'kdc' => array(
                                'image/dcraw',
                                'image/kodak-kdc',
                                'image/raw-kodak'
                        ),
                        'kdelnk' => array(
                                'application/desktop',
                                'application/gnome-app-info',
                                'text/plain'
                        ),
                        'kexi' => array(
                                'application/kexiproject-sqlite',
                                'application/kexiproject-sqlite2',
                                'application/kexiproject-sqlite3',
                                'application/sqlite2',
                                'application/sqlite3',
                                'application/vnd.kde.kexi'
                        ),
                        'kexic' => array(
                                'application/kexi-connectiondata'
                        ),
                        'kexis' => array(
                                'application/kexiproject-shortcut'
                        ),
                        'key' => array(
                                'application/apple.iwork',
                                'application/apple.keynote',
                                'application/iwork-keynote-sffkey',
                                'application/zip'
                        ),
                        'kfo' => array(
                                'application/kde.kformula',
                                'application/kformula'
                        ),
                        'kia' => array(
                                'application/kidspiration'
                        ),
                        'kil' => array(
                                'application/killustrator'
                        ),
                        'kino' => array(
                                'application/smil',
                                'application/smil+xml',
                                'application/xml'
                        ),
                        'kml' => array(
                                'application/google-earth.kml+xml',
                                'application/xml'
                        ),
                        'kmz' => array(
                                'application/google-earth.kmz',
                                'application/zip'
                        ),
                        'kne' => array(
                                'application/kinar'
                        ),
                        'knp' => array(
                                'application/kinar'
                        ),
                        'kon' => array(
                                'application/kde.kontour',
                                'application/kontour'
                        ),
                        'koz' => array(
                                'audio/audiokoz'
                        ),
                        'kpm' => array(
                                'application/kpovmodeler'
                        ),
                        'kpr' => array(
                                'application/kde.kpresenter',
                                'application/kpresenter'
                        ),
                        'kpt' => array(
                                'application/kde.kpresenter',
                                'application/kpresenter'
                        ),
                        'kpxx' => array(
                                'application/ds-keypoint'
                        ),
                        'kra' => array(
                                'application/krita'
                        ),
                        'ks' => array(
                                'application/java-keystore'
                        ),
                        'ksp' => array(
                                'application/kde.kspread',
                                'application/kspread'
                        ),
                        'ktr' => array(
                                'application/kahootz'
                        ),
                        'ktx' => array(
                                'image/ktx'
                        ),
                        'ktz' => array(
                                'application/kahootz'
                        ),
                        'kud' => array(
                                'application/kugar'
                        ),
                        'kwd' => array(
                                'application/kde.kword',
                                'application/kword'
                        ),
                        'kwt' => array(
                                'application/kde.kword',
                                'application/kword'
                        ),
                        'la' => array(
                                'application/shared-library-la',
                                'text/plain'
                        ),
                        'lasjson' => array(
                                'application/las.las+json'
                        ),
                        'lasxml' => array(
                                'application/las.las+xml'
                        ),
                        'latex' => array(
                                'application/latex',
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'lbd' => array(
                                'application/llamagraphics.life-balance.desktop'
                        ),
                        'lbe' => array(
                                'application/llamagraphics.life-balance.exchange+xml'
                        ),
                        'lbm' => array(
                                'application/iff',
                                'image/iff',
                                'image/ilbm'
                        ),
                        'ldif' => array(
                                'text/ldif',
                                'text/plain'
                        ),
                        'le' => array(
                                'application/bluetooth.le.oob'
                        ),
                        'les' => array(
                                'application/hhe.lesson-player'
                        ),
                        'less' => array(
                                'text/less',
                                'text/plain'
                        ),
                        'lgr' => array(
                                'application/lgr+xml'
                        ),
                        'lha' => array(
                                'application/lha',
                                'application/lzh-compressed',
                                'application/octet-stream'
                        ),
                        'lhs' => array(
                                'text/haskell',
                                'text/literate-haskell',
                                'text/plain'
                        ),
                        'lhz' => array(
                                'application/lhz'
                        ),
                        'link66' => array(
                                'application/route66.link66+xml'
                        ),
                        'lisp' => array(
                                'text/common-lisp',
                                'text/plain'
                        ),
                        'list' => array(
                                'text/plain'
                        ),
                        'list3820' => array(
                                'application/ibm.modcap'
                        ),
                        'listafp' => array(
                                'application/ibm.modcap'
                        ),
                        'lmp' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'lnk' => array(
                                'application/ms-shortcut'
                        ),
                        'lnx' => array(
                                'application/atari-lynx-rom'
                        ),
                        'log' => array(
                                'text/log',
                                'text/plain'
                        ),
                        'lostsyncxml' => array(
                                'application/lostsync+xml'
                        ),
                        'lostxml' => array(
                                'application/lost+xml'
                        ),
                        'lrf' => array(
                                'application/octet-stream'
                        ),
                        'lrm' => array(
                                'application/ms-lrm'
                        ),
                        'lrv' => array(
                                'video/m4v',
                                'video/mp4',
                                'video/mp4v-es'
                        ),
                        'lrz' => array(
                                'application/lrzip'
                        ),
                        'lsp' => array(
                                'text/common-lisp',
                                'text/plain'
                        ),
                        'ltf' => array(
                                'application/frogans.ltf'
                        ),
                        'ltx' => array(
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'lua' => array(
                                'application/executable',
                                'text/lua',
                                'text/plain'
                        ),
                        'lvp' => array(
                                'audio/lucent.voice'
                        ),
                        'lwo' => array(
                                'image/lwo'
                        ),
                        'lwob' => array(
                                'image/lwo'
                        ),
                        'lwp' => array(
                                'application/lotus-wordpro'
                        ),
                        'lws' => array(
                                'image/lws'
                        ),
                        'lxf' => array(
                                'application/lxf'
                        ),
                        'ly' => array(
                                'text/lilypond',
                                'text/plain'
                        ),
                        'lyx' => array(
                                'application/lyx',
                                'text/lyx',
                                'text/plain'
                        ),
                        'lz' => array(
                                'application/lzip'
                        ),
                        'lz4' => array(
                                'application/lz4'
                        ),
                        'lzh' => array(
                                'application/lha',
                                'application/lzh-compressed',
                                'application/octet-stream'
                        ),
                        'lzma' => array(
                                'application/lzma'
                        ),
                        'lzo' => array(
                                'application/lzop'
                        ),
                        'm13' => array(
                                'application/msmediaview'
                        ),
                        'm14' => array(
                                'application/msmediaview'
                        ),
                        'm15' => array(
                                'audio/mod'
                        ),
                        'm1u' => array(
                                'text/plain',
                                'video/mpegurl'
                        ),
                        'm1v' => array(
                                'video/mpeg'
                        ),
                        'm21' => array(
                                'application/mp21'
                        ),
                        'm2a' => array(
                                'audio/mpeg'
                        ),
                        'm2t' => array(
                                'video/mp2t'
                        ),
                        'm2ts' => array(
                                'video/mp2t'
                        ),
                        'm2v' => array(
                                'video/mpeg'
                        ),
                        'm3' => array(
                                'text/modula',
                                'text/plain'
                        ),
                        'm3a' => array(
                                'audio/mpeg'
                        ),
                        'm3u' => array(
                                'application/apple.mpegurl',
                                'application/m3u',
                                'audio/m3u',
                                'audio/mp3-playlist',
                                'audio/mpegurl',
                                'text/plain'
                        ),
                        'm3u8' => array(
                                'application/apple.mpegurl',
                                'application/m3u',
                                'audio/m3u',
                                'audio/mp3-playlist',
                                'audio/mpegurl',
                                'text/plain'
                        ),
                        'm4' => array(
                                'application/m4',
                                'text/plain'
                        ),
                        'm4a' => array(
                                'application/quicktime',
                                'audio/m4a',
                                'audio/mp4',
                                'audio/mp4a'
                        ),
                        'm4b' => array(
                                'application/quicktime',
                                'audio/m4a',
                                'audio/m4b',
                                'audio/mp4',
                                'audio/mp4a'
                        ),
                        'm4s' => array(
                                'video/iso.segment'
                        ),
                        'm4u' => array(
                                'text/plain',
                                'video/mpegurl',
                                'video/vnd-mpegurl'
                        ),
                        'm4v' => array(
                                'video/m4v',
                                'video/mp4',
                                'video/mp4v-es'
                        ),
                        'm7' => array(
                                'application/thomson-cartridge-memo7'
                        ),
                        'ma' => array(
                                'application/mathematica'
                        ),
                        'mab' => array(
                                'application/markaby',
                                'application/ruby'
                        ),
                        'mads' => array(
                                'application/mads+xml'
                        ),
                        'mag' => array(
                                'application/ecowin.chart'
                        ),
                        'mak' => array(
                                'text/makefile',
                                'text/plain'
                        ),
                        'makefile' => array(
                                'text/makefile',
                                'text/plain'
                        ),
                        'maker' => array(
                                'application/framemaker'
                        ),
                        'man' => array(
                                'application/troff',
                                'application/troff-man',
                                'application/troff-me',
                                'application/troff-ms',
                                'text/plain',
                                'text/troff'
                        ),
                        'manifest' => array(
                                'text/cache-manifest',
                                'text/plain'
                        ),
                        'mar' => array(
                                'application/octet-stream'
                        ),
                        'markdown' => array(
                                'text/markdown',
                                'text/plain',
                                'text/web-markdown'
                        ),
                        'mat' => array(
                                'application/matlab-data',
                                'application/matlab-mat'
                        ),
                        'mathml' => array(
                                'application/mathml+xml'
                        ),
                        'mb' => array(
                                'application/mathematica'
                        ),
                        'mbk' => array(
                                'application/mobius.mbk'
                        ),
                        'mbox' => array(
                                'application/mbox',
                                'text/plain',
                                'text/tika-text-based-message'
                        ),
                        'mc1' => array(
                                'application/medcalcdata'
                        ),
                        'mcd' => array(
                                'application/mcd',
                                'application/vectorworks'
                        ),
                        'mcurl' => array(
                                'text/curl.mcurl'
                        ),
                        'md' => array(
                                'text/markdown',
                                'text/plain',
                                'text/web-markdown'
                        ),
                        'mdb' => array(
                                'application/mdb',
                                'application/ms-access',
                                'application/msaccess',
                                'zz-application/zz-winassoc-mdb'
                        ),
                        'mdc' => array(
                                'application/marlin.drm.mdcf'
                        ),
                        'mdi' => array(
                                'image/ms-modi'
                        ),
                        'mdtext' => array(
                                'text/plain',
                                'text/web-markdown'
                        ),
                        'mdx' => array(
                                'application/genesis-32x-rom'
                        ),
                        'me' => array(
                                'application/troff',
                                'application/troff-man',
                                'application/troff-me',
                                'application/troff-ms',
                                'text/plain',
                                'text/troff',
                                'text/troff-me'
                        ),
                        'med' => array(
                                'audio/mod'
                        ),
                        'mef' => array(
                                'image/raw-mamiya'
                        ),
                        'mesh' => array(
                                'model/mesh'
                        ),
                        'meta' => array(
                                'text/plain'
                        ),
                        'meta4' => array(
                                'application/metalink4+xml',
                                'application/xml'
                        ),
                        'metalink' => array(
                                'application/metalink+xml',
                                'application/xml'
                        ),
                        'mets' => array(
                                'application/mets+xml'
                        ),
                        'mf' => array(
                                'text/plain'
                        ),
                        'mf4' => array(
                                'application/mf4'
                        ),
                        'mfm' => array(
                                'application/mfmp'
                        ),
                        'mft' => array(
                                'application/rpki-manifest'
                        ),
                        'mg' => array(
                                'text/modula',
                                'text/plain'
                        ),
                        'mgp' => array(
                                'application/magicpoint',
                                'application/osgeo.mapguide.package',
                                'text/plain'
                        ),
                        'mgz' => array(
                                'application/proteus.magazine'
                        ),
                        'mht' => array(
                                'application/mimearchive',
                                'message/rfc822',
                                'multipart/related',
                                'text/tika-text-based-message'
                        ),
                        'mhtml' => array(
                                'application/mimearchive',
                                'message/rfc822',
                                'multipart/related',
                                'text/tika-text-based-message'
                        ),
                        'mid' => array(
                                'audio/midi',
                                'audio/sp-midi'
                        ),
                        'midi' => array(
                                'audio/midi'
                        ),
                        'mie' => array(
                                'application/mie'
                        ),
                        'mif' => array(
                                'application/frame',
                                'application/mif'
                        ),
                        'mime' => array(
                                'message/rfc822',
                                'text/tika-text-based-message'
                        ),
                        'minipsf' => array(
                                'audio/minipsf',
                                'audio/psf'
                        ),
                        'miz' => array(
                                'text/mizar'
                        ),
                        'mj2' => array(
                                'image/jp2-container',
                                'video/mj2'
                        ),
                        'mjp2' => array(
                                'image/jp2-container',
                                'video/mj2'
                        ),
                        'mjs' => array(
                                'application/ecmascript',
                                'application/javascript',
                                'text/javascript'
                        ),
                        'mk' => array(
                                'text/makefile',
                                'text/plain'
                        ),
                        'mk3d' => array(
                                'application/matroska',
                                'video/matroska',
                                'video/matroska-3d'
                        ),
                        'mka' => array(
                                'application/matroska',
                                'audio/matroska'
                        ),
                        'mkd' => array(
                                'text/markdown',
                                'text/plain',
                                'text/web-markdown'
                        ),
                        'mks' => array(
                                'video/matroska'
                        ),
                        'mkv' => array(
                                'application/matroska',
                                'video/matroska'
                        ),
                        'ml' => array(
                                'text/ml',
                                'text/ocaml',
                                'text/plain'
                        ),
                        'mli' => array(
                                'text/ocaml',
                                'text/plain'
                        ),
                        'mlp' => array(
                                'application/dolby.mlp',
                                'audio/dolby.mlp'
                        ),
                        'mm' => array(
                                'text/plain',
                                'text/troff-mm'
                        ),
                        'mmap' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmas' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmat' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmd' => array(
                                'application/chipnuts.karaoke-mmd'
                        ),
                        'mmdb' => array(
                                'application/maxmind.maxmind-db'
                        ),
                        'mmf' => array(
                                'application/smaf'
                        ),
                        'mml' => array(
                                'application/mathml+xml',
                                'application/xml',
                                'text/mathml'
                        ),
                        'mmmp' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmp' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmpt' => array(
                                'application/mindjet.mindmanager',
                                'application/zip'
                        ),
                        'mmr' => array(
                                'image/fujixerox.edmics-mmr'
                        ),
                        'mng' => array(
                                'video/mng'
                        ),
                        'mny' => array(
                                'application/msmoney'
                        ),
                        'mo' => array(
                                'application/gettext-translation',
                                'text/modelica',
                                'text/plain'
                        ),
                        'mo3' => array(
                                'audio/mo3'
                        ),
                        'mobi' => array(
                                'application/mobipocket-ebook',
                                'application/palm'
                        ),
                        'moc' => array(
                                'text/moc',
                                'text/plain'
                        ),
                        'mod' => array(
                                'application/xml-dtd',
                                'audio/mod'
                        ),
                        'model-inter' => array(
                                'application/vd-study'
                        ),
                        'mods' => array(
                                'application/mods+xml'
                        ),
                        'mof' => array(
                                'text/csrc',
                                'text/mof'
                        ),
                        'moov' => array(
                                'video/quicktime'
                        ),
                        'mos' => array(
                                'image/raw-leaf'
                        ),
                        'mount' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'mov' => array(
                                'application/quicktime',
                                'video/quicktime'
                        ),
                        'movie' => array(
                                'video/sgi-movie'
                        ),
                        'mp1' => array(
                                'audio/mpeg'
                        ),
                        'mp2' => array(
                                'audio/mp2',
                                'audio/mpeg',
                                'video/mpeg',
                                'video/mpeg-system',
                                'video/mpeg2'
                        ),
                        'mp21' => array(
                                'application/mp21'
                        ),
                        'mp2a' => array(
                                'audio/mpeg'
                        ),
                        'mp3' => array(
                                'audio/mp3',
                                'audio/mpeg',
                                'audio/mpg'
                        ),
                        'mp4' => array(
                                'video/m4v',
                                'video/mp4',
                                'video/mp4v-es',
                                'video/objectvideo',
                                'video/quicktime'
                        ),
                        'mp4a' => array(
                                'application/quicktime',
                                'audio/m4a',
                                'audio/mp4',
                                'audio/mp4a'
                        ),
                        'mp4s' => array(
                                'application/mp4',
                                'application/quicktime'
                        ),
                        'mp4v' => array(
                                'video/mp4',
                                'video/quicktime'
                        ),
                        'mpc' => array(
                                'application/mophun.certificate',
                                'audio/musepack'
                        ),
                        'mpd' => array(
                                'application/dash+xml'
                        ),
                        'mpdd' => array(
                                'application/dashdelta'
                        ),
                        'mpe' => array(
                                'video/mpeg',
                                'video/mpeg-system',
                                'video/mpeg2'
                        ),
                        'mpeg' => array(
                                'video/mpeg',
                                'video/mpeg-system',
                                'video/mpeg2'
                        ),
                        'mpf' => array(
                                'application/media-policy-dataset+xml',
                                'text/ms-mediapackage'
                        ),
                        'mpg' => array(
                                'video/mpeg',
                                'video/mpeg-system',
                                'video/mpeg2'
                        ),
                        'mpg4' => array(
                                'video/mp4',
                                'video/quicktime'
                        ),
                        'mpga' => array(
                                'audio/mp3',
                                'audio/mpeg',
                                'audio/mpg'
                        ),
                        'mpkg' => array(
                                'application/apple.installer+xml'
                        ),
                        'mpl' => array(
                                'video/mp2t'
                        ),
                        'mpls' => array(
                                'video/mp2t'
                        ),
                        'mpm' => array(
                                'application/blueice.multipass'
                        ),
                        'mpn' => array(
                                'application/mophun.application'
                        ),
                        'mpp' => array(
                                'application/ms-project',
                                'application/tika-msoffice',
                                'audio/musepack'
                        ),
                        'mpt' => array(
                                'application/ms-project',
                                'application/tika-msoffice'
                        ),
                        'mpx' => array(
                                'application/project',
                                'text/plain'
                        ),
                        'mpy' => array(
                                'application/ibm.minipay'
                        ),
                        'mqy' => array(
                                'application/mobius.mqy'
                        ),
                        'mrc' => array(
                                'application/marc'
                        ),
                        'mrcx' => array(
                                'application/marcxml+xml'
                        ),
                        'mrl' => array(
                                'text/mrml'
                        ),
                        'mrml' => array(
                                'text/mrml'
                        ),
                        'mrw' => array(
                                'image/dcraw',
                                'image/minolta-mrw',
                                'image/raw-minolta'
                        ),
                        'ms' => array(
                                'application/troff',
                                'application/troff-man',
                                'application/troff-me',
                                'application/troff-ms',
                                'text/plain',
                                'text/troff',
                                'text/troff-ms'
                        ),
                        'msa' => array(
                                'application/msa-disk-image'
                        ),
                        'mscml' => array(
                                'application/mediaservercontrol+xml'
                        ),
                        'msd' => array(
                                'application/fdsn.mseed'
                        ),
                        'mseed' => array(
                                'application/fdsn.mseed'
                        ),
                        'mseq' => array(
                                'application/mseq'
                        ),
                        'msf' => array(
                                'application/epson.msf'
                        ),
                        'msg' => array(
                                'application/ms-outlook',
                                'application/tika-msoffice'
                        ),
                        'msh' => array(
                                'model/mesh'
                        ),
                        'msi' => array(
                                'application/ms-installer',
                                'application/msdownload',
                                'application/msi',
                                'application/octet-stream',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/windows-installer'
                        ),
                        'msl' => array(
                                'application/mobius.msl'
                        ),
                        'msm' => array(
                                'application/octet-stream',
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'msod' => array(
                                'image/msod'
                        ),
                        'msp' => array(
                                'application/ms-installer',
                                'application/msi',
                                'application/octet-stream',
                                'application/tika-msoffice',
                                'application/windows-installer'
                        ),
                        'mst' => array(
                                'application/ms-installer',
                                'application/msi',
                                'application/tika-msoffice',
                                'application/windows-installer'
                        ),
                        'msty' => array(
                                'application/muvee.style'
                        ),
                        'msx' => array(
                                'application/msx-rom'
                        ),
                        'mtm' => array(
                                'audio/mod'
                        ),
                        'mts' => array(
                                'model/mts',
                                'video/mp2t'
                        ),
                        'multitrack' => array(
                                'audio/presonus.multitrack'
                        ),
                        'mup' => array(
                                'text/mup',
                                'text/plain'
                        ),
                        'mus' => array(
                                'application/musician'
                        ),
                        'musd' => array(
                                'application/mmt-usd+xml'
                        ),
                        'musicxml' => array(
                                'application/recordare.musicxml+xml'
                        ),
                        'mvb' => array(
                                'application/msmediaview'
                        ),
                        'mvt' => array(
                                'application/mapbox-vector-tile'
                        ),
                        'mwf' => array(
                                'application/mfer'
                        ),
                        'mxf' => array(
                                'application/mxf'
                        ),
                        'mxi' => array(
                                'application/vd-study'
                        ),
                        'mxl' => array(
                                'application/recordare.musicxml'
                        ),
                        'mxmf' => array(
                                'audio/mobile-xmf',
                                'audio/nokia.mobile-xmf'
                        ),
                        'mxml' => array(
                                'application/xv+xml'
                        ),
                        'mxs' => array(
                                'application/triscape.mxs'
                        ),
                        'mxu' => array(
                                'text/plain',
                                'video/mpegurl',
                                'video/vnd-mpegurl'
                        ),
                        'n-gage' => array(
                                'application/nokia.n-gage.symbian.install'
                        ),
                        'n3' => array(
                                'text/n3',
                                'text/plain'
                        ),
                        'n64' => array(
                                'application/n64-rom'
                        ),
                        'nb' => array(
                                'application/mathematica',
                                'application/wolfram.mathematica',
                                'text/plain'
                        ),
                        'nbp' => array(
                                'application/wolfram.player'
                        ),
                        'nc' => array(
                                'application/netcdf'
                        ),
                        'ncx' => array(
                                'application/dtbncx+xml'
                        ),
                        'ndc' => array(
                                'application/osa.netdeploy'
                        ),
                        'nds' => array(
                                'application/nintendo-ds-rom'
                        ),
                        'nef' => array(
                                'image/dcraw',
                                'image/nikon-nef',
                                'image/raw-nikon'
                        ),
                        'nes' => array(
                                'application/nes-rom'
                        ),
                        'nez' => array(
                                'application/nes-rom'
                        ),
                        'nfo' => array(
                                'text/nfo',
                                'text/readme'
                        ),
                        'ngdat' => array(
                                'application/nokia.n-gage.data'
                        ),
                        'ngp' => array(
                                'application/neo-geo-pocket-rom'
                        ),
                        'nim' => array(
                                'video/nokia.interleaved-multimedia'
                        ),
                        'nitf' => array(
                                'application/nitf',
                                'image/nitf',
                                'image/ntf'
                        ),
                        'nlu' => array(
                                'application/neurolanguage.nlu'
                        ),
                        'nml' => array(
                                'application/enliven'
                        ),
                        'nnd' => array(
                                'application/noblenet-directory'
                        ),
                        'nns' => array(
                                'application/noblenet-sealer'
                        ),
                        'nnw' => array(
                                'application/noblenet-web'
                        ),
                        'not' => array(
                                'text/mup',
                                'text/plain'
                        ),
                        'notebook' => array(
                                'application/smart.notebook'
                        ),
                        'npx' => array(
                                'image/net-fpx'
                        ),
                        'nrw' => array(
                                'image/raw-nikon'
                        ),
                        'nsc' => array(
                                'application/conference',
                                'application/ms-asf',
                                'application/netshow-channel'
                        ),
                        'nsf' => array(
                                'application/lotus-notes'
                        ),
                        'nsv' => array(
                                'video/nsv'
                        ),
                        'ntf' => array(
                                'application/nitf',
                                'image/nitf',
                                'image/ntf'
                        ),
                        'numbers' => array(
                                'application/apple.iwork',
                                'application/apple.numbers'
                        ),
                        'nzb' => array(
                                'application/nzb',
                                'application/xml'
                        ),
                        'oa2' => array(
                                'application/fujitsu.oasys2'
                        ),
                        'oa3' => array(
                                'application/fujitsu.oasys3'
                        ),
                        'oas' => array(
                                'application/fujitsu.oasys'
                        ),
                        'obd' => array(
                                'application/msbinder'
                        ),
                        'obg' => array(
                                'application/openblox.game-binary'
                        ),
                        'obgx' => array(
                                'application/openblox.game+xml'
                        ),
                        'obj' => array(
                                'application/tgif'
                        ),
                        'ocaml' => array(
                                'text/ocaml',
                                'text/plain'
                        ),
                        'ocl' => array(
                                'text/ocl',
                                'text/plain'
                        ),
                        'oda' => array(
                                'application/oda'
                        ),
                        'odb' => array(
                                'application/oasis.opendocument.base',
                                'application/oasis.opendocument.database',
                                'application/sun.xml.base',
                                'application/zip'
                        ),
                        'odc' => array(
                                'application/oasis.opendocument.chart',
                                'application/vnd.oasis.opendocument.chart',
                                'application/zip'
                        ),
                        'odf' => array(
                                'application/oasis.opendocument.formula',
                                'application/vnd.oasis.opendocument.formula',
                                'application/zip'
                        ),
                        'odft' => array(
                                'application/oasis.opendocument.formula-template',
                                'application/vnd.oasis.opendocument.formula-template'
                        ),
                        'odg' => array(
                                'application/oasis.opendocument.graphics',
                                'application/vnd.oasis.opendocument.graphics',
                                'application/zip'
                        ),
                        'odi' => array(
                                'application/oasis.opendocument.image',
                                'application/vnd.oasis.opendocument.image',
                                'application/zip'
                        ),
                        'odm' => array(
                                'application/oasis.opendocument.text-master',
                                'application/zip'
                        ),
                        'odp' => array(
                                'application/oasis.opendocument.presentation',
                                'application/vnd.oasis.opendocument.presentation',
                                'application/zip'
                        ),
                        'ods' => array(
                                'application/oasis.opendocument.spreadsheet',
                                'application/vnd.oasis.opendocument.spreadsheet',
                                'application/zip'
                        ),
                        'odt' => array(
                                'application/oasis.opendocument.text',
                                'application/vnd.oasis.opendocument.text',
                                'application/zip'
                        ),
                        'odx' => array(
                                'application/odx'
                        ),
                        'oeb' => array(
                                'application/openeye.oeb'
                        ),
                        'oga' => array(
                                'application/ogg',
                                'audio/flac+ogg',
                                'audio/ogg',
                                'audio/oggflac',
                                'audio/speex+ogg',
                                'audio/vorbis',
                                'audio/vorbis+ogg'
                        ),
                        'ogex' => array(
                                'model/opengex'
                        ),
                        'ogg' => array(
                                'application/ogg',
                                'audio/flac+ogg',
                                'audio/ogg',
                                'audio/oggflac',
                                'audio/speex+ogg',
                                'audio/vorbis',
                                'audio/vorbis+ogg',
                                'video/ogg',
                                'video/theora',
                                'video/theora+ogg'
                        ),
                        'ogm' => array(
                                'video/ogg',
                                'video/ogm',
                                'video/ogm+ogg'
                        ),
                        'ogv' => array(
                                'application/ogg',
                                'video/ogg'
                        ),
                        'ogx' => array(
                                'application/ogg'
                        ),
                        'old' => array(
                                'application/trash'
                        ),
                        'oleo' => array(
                                'application/oleo'
                        ),
                        'omdoc' => array(
                                'application/omdoc+xml'
                        ),
                        'one' => array(
                                'application/onenote',
                                'application/onenoteformatone'
                        ),
                        'onepkg' => array(
                                'application/ms-cab-compressed',
                                'application/onenote',
                                'application/onenoteformatpackage'
                        ),
                        'onetmp' => array(
                                'application/msonenote',
                                'application/onenote'
                        ),
                        'onetoc' => array(
                                'application/onenote',
                                'application/onenoteformatonetoc2'
                        ),
                        'onetoc2' => array(
                                'application/onenote',
                                'application/onenoteformatonetoc2'
                        ),
                        'ooc' => array(
                                'text/csrc',
                                'text/ooc'
                        ),
                        'opf' => array(
                                'application/oebps-package+xml'
                        ),
                        'opml' => array(
                                'application/xml',
                                'text/opml',
                                'text/opml+xml'
                        ),
                        'oprc' => array(
                                'application/palm',
                                'application/palm-database'
                        ),
                        'opus' => array(
                                'application/ogg',
                                'audio/ogg',
                                'audio/opus',
                                'audio/opus+ogg'
                        ),
                        'or3' => array(
                                'application/lotus-organizer'
                        ),
                        'ora' => array(
                                'application/zip',
                                'image/openraster'
                        ),
                        'orf' => array(
                                'image/dcraw',
                                'image/olympus-orf',
                                'image/raw-olympus'
                        ),
                        'org' => array(
                                'application/lotus-organizer'
                        ),
                        'orq' => array(
                                'application/ocsp-request'
                        ),
                        'ors' => array(
                                'application/ocsp-response'
                        ),
                        'osf' => array(
                                'application/yamaha.openscoreformat'
                        ),
                        'osfpvg' => array(
                                'application/yamaha.openscoreformat.osfpvg+xml'
                        ),
                        'osm' => array(
                                'application/openstreetmap.data+xml'
                        ),
                        'ost' => array(
                                'application/ms-outlook-pst'
                        ),
                        'otc' => array(
                                'application/oasis.opendocument.chart-template',
                                'application/vnd.oasis.opendocument.chart-template',
                                'application/zip'
                        ),
                        'otf' => array(
                                'application/font-otf',
                                'application/oasis.opendocument.formula-template',
                                'application/zip',
                                'font/otf',
                                'font/ttf'
                        ),
                        'otg' => array(
                                'application/oasis.opendocument.graphics-template',
                                'application/vnd.oasis.opendocument.graphics-template',
                                'application/zip'
                        ),
                        'oth' => array(
                                'application/oasis.opendocument.text-web',
                                'application/vnd.oasis.opendocument.text-web',
                                'application/zip'
                        ),
                        'oti' => array(
                                'application/oasis.opendocument.image-template',
                                'application/vnd.oasis.opendocument.image-template'
                        ),
                        'otm' => array(
                                'application/oasis.opendocument.text-master',
                                'application/vnd.oasis.opendocument.text-master'
                        ),
                        'otp' => array(
                                'application/oasis.opendocument.presentation-template',
                                'application/vnd.oasis.opendocument.presentation-template',
                                'application/zip'
                        ),
                        'ots' => array(
                                'application/oasis.opendocument.spreadsheet-template',
                                'application/vnd.oasis.opendocument.spreadsheet-template',
                                'application/zip'
                        ),
                        'ott' => array(
                                'application/oasis.opendocument.text-template',
                                'application/vnd.oasis.opendocument.text-template',
                                'application/zip'
                        ),
                        'owl' => array(
                                'application/rdf+xml',
                                'application/xml',
                                'text/rdf'
                        ),
                        'owx' => array(
                                'application/owl+xml',
                                'application/xml'
                        ),
                        'oxlicg' => array(
                                'application/oxli.countgraph'
                        ),
                        'oxps' => array(
                                'application/ms-xpsdocument',
                                'application/oxps',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'oxt' => array(
                                'application/openofficeorg.extension',
                                'application/zip'
                        ),
                        'p' => array(
                                'text/pascal'
                        ),
                        'p10' => array(
                                'application/pkcs10'
                        ),
                        'p12' => array(
                                'application/pkcs12'
                        ),
                        'p2p' => array(
                                'application/wfa.p2p'
                        ),
                        'p65' => array(
                                'application/ole-storage',
                                'application/pagemaker'
                        ),
                        'p7b' => array(
                                'application/pkcs7-certificates'
                        ),
                        'p7c' => array(
                                'application/pkcs7-mime'
                        ),
                        'p7m' => array(
                                'application/pkcs7-mime'
                        ),
                        'p7r' => array(
                                'application/pkcs7-certreqresp'
                        ),
                        'p7s' => array(
                                'application/pkcs7-signature',
                                'text/plain'
                        ),
                        'p8' => array(
                                'application/pkcs8'
                        ),
                        'pack' => array(
                                'application/java-pack200'
                        ),
                        'package' => array(
                                'application/autopackage'
                        ),
                        'pages' => array(
                                'application/apple.iwork',
                                'application/apple.pages'
                        ),
                        'pak' => array(
                                'application/pak'
                        ),
                        'par2' => array(
                                'application/par2'
                        ),
                        'part' => array(
                                'application/partial-download'
                        ),
                        'pas' => array(
                                'text/pascal',
                                'text/plain'
                        ),
                        'pat' => array(
                                'image/gimp-pat'
                        ),
                        'patch' => array(
                                'text/diff',
                                'text/patch',
                                'text/plain'
                        ),
                        'path' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'paw' => array(
                                'application/pawaafile'
                        ),
                        'pbd' => array(
                                'application/powerbuilder6',
                                'application/powerbuilder6-s',
                                'application/powerbuilder7',
                                'application/powerbuilder7-s',
                                'application/powerbuilder75',
                                'application/powerbuilder75-s'
                        ),
                        'pbm' => array(
                                'image/portable-anymap',
                                'image/portable-bitmap'
                        ),
                        'pcap' => array(
                                'application/pcap',
                                'application/tcpdump.pcap'
                        ),
                        'pcd' => array(
                                'image/photo-cd'
                        ),
                        'pce' => array(
                                'application/pc-engine-rom'
                        ),
                        'pcf' => array(
                                'application/cisco-vpn-settings',
                                'application/font-pcf'
                        ),
                        'pcl' => array(
                                'application/hp-pcl'
                        ),
                        'pclxl' => array(
                                'application/hp-pclxl'
                        ),
                        'pct' => array(
                                'image/pict'
                        ),
                        'pcurl' => array(
                                'application/curl.pcurl'
                        ),
                        'pcx' => array(
                                'image/pc-paintbrush',
                                'image/pcx',
                                'image/zbrush.pcx'
                        ),
                        'pdb' => array(
                                'application/aportisdoc',
                                'application/palm',
                                'application/palm-database',
                                'application/pilot',
                                'chemical/pdb'
                        ),
                        'pdc' => array(
                                'application/aportisdoc',
                                'application/palm'
                        ),
                        'pdf' => array(
                                'application/acrobat',
                                'application/nappdf',
                                'application/pdf',
                                'image/pdf'
                        ),
                        'pdx' => array(
                                'application/pdx'
                        ),
                        'pef' => array(
                                'image/dcraw',
                                'image/pentax-pef',
                                'image/raw-pentax'
                        ),
                        'pem' => array(
                                'application/x509-ca-cert'
                        ),
                        'pen' => array(
                                'text/plain'
                        ),
                        'perl' => array(
                                'application/executable',
                                'application/perl',
                                'text/perl',
                                'text/plain'
                        ),
                        'pfa' => array(
                                'application/font-type1',
                                'application/postscript'
                        ),
                        'pfb' => array(
                                'application/font-type1',
                                'application/postscript'
                        ),
                        'pfm' => array(
                                'application/font-printer-metric',
                                'application/font-type1'
                        ),
                        'pfr' => array(
                                'application/dvb.pfr',
                                'application/font-tdpfr'
                        ),
                        'pfx' => array(
                                'application/pkcs12'
                        ),
                        'pgm' => array(
                                'image/portable-anymap',
                                'image/portable-graymap'
                        ),
                        'pgn' => array(
                                'application/chess-pgn',
                                'text/plain'
                        ),
                        'pgp' => array(
                                'application/pgp',
                                'application/pgp-encrypted',
                                'application/pgp-keys',
                                'application/pgp-signature',
                                'text/plain'
                        ),
                        'php' => array(
                                'application/php',
                                'text/php',
                                'text/plain'
                        ),
                        'php3' => array(
                                'application/php',
                                'text/php',
                                'text/plain'
                        ),
                        'php4' => array(
                                'application/php',
                                'text/php',
                                'text/plain'
                        ),
                        'php5' => array(
                                'application/php',
                                'text/plain'
                        ),
                        'phps' => array(
                                'application/php',
                                'text/plain'
                        ),
                        'pic' => array(
                                'image/pict',
                                'image/radiance'
                        ),
                        'pict' => array(
                                'image/pict'
                        ),
                        'pict1' => array(
                                'image/pict'
                        ),
                        'pict2' => array(
                                'image/pict'
                        ),
                        'pil' => array(
                                'application/piaccess.application-licence'
                        ),
                        'pk' => array(
                                'application/tex-pk'
                        ),
                        'pkg' => array(
                                'application/apple.installer+xml',
                                'application/octet-stream',
                                'application/xar'
                        ),
                        'pki' => array(
                                'application/pkixcmp'
                        ),
                        'pkipath' => array(
                                'application/pkix-pkipath'
                        ),
                        'pkr' => array(
                                'application/pgp-keys',
                                'text/plain'
                        ),
                        'pl' => array(
                                'application/executable',
                                'application/perl',
                                'text/perl',
                                'text/plain'
                        ),
                        'pla' => array(
                                'audio/iriver-pla'
                        ),
                        'plb' => array(
                                'application/3gpp.pic-bw-large'
                        ),
                        'plc' => array(
                                'application/mobius.plc'
                        ),
                        'plf' => array(
                                'application/pocketlearn'
                        ),
                        'plj' => array(
                                'audio/everad.plj'
                        ),
                        'pln' => array(
                                'application/planperfect'
                        ),
                        'plp' => array(
                                'application/panoply'
                        ),
                        'pls' => array(
                                'application/pls',
                                'application/pls+xml',
                                'audio/scpls'
                        ),
                        'pm' => array(
                                'application/executable',
                                'application/ole-storage',
                                'application/pagemaker',
                                'application/perl',
                                'text/perl',
                                'text/plain'
                        ),
                        'pm6' => array(
                                'application/ole-storage',
                                'application/pagemaker'
                        ),
                        'pmd' => array(
                                'application/ole-storage',
                                'application/pagemaker'
                        ),
                        'pml' => array(
                                'application/ctc-posml'
                        ),
                        'png' => array(
                                'image/mozilla.apng',
                                'image/png'
                        ),
                        'pnm' => array(
                                'image/portable-anymap'
                        ),
                        'pntg' => array(
                                'image/macpaint'
                        ),
                        'po' => array(
                                'application/gettext',
                                'text/gettext-translation',
                                'text/plain',
                                'text/po'
                        ),
                        'pod' => array(
                                'application/executable',
                                'application/perl',
                                'text/plain'
                        ),
                        'pom' => array(
                                'text/plain'
                        ),
                        'por' => array(
                                'application/spss-por'
                        ),
                        'portpkg' => array(
                                'application/macports.portpkg'
                        ),
                        'pot' => array(
                                'application/ms-office',
                                'application/ms-powerpoint',
                                'application/mspowerpoint',
                                'application/powerpoint',
                                'application/tika-msoffice',
                                'text/gettext-translation-template',
                                'text/plain',
                                'text/pot'
                        ),
                        'potm' => array(
                                'application/ms-powerpoint.template.macroenabled.12',
                                'application/openxmlformats-officedocument.presentationml.template',
                                'application/tika-ooxml'
                        ),
                        'potx' => array(
                                'application/openxmlformats-officedocument.presentationml-template',
                                'application/openxmlformats-officedocument.presentationml.template',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'pp' => array(
                                'text/pascal',
                                'text/plain'
                        ),
                        'ppa' => array(
                                'application/ms-office',
                                'application/ms-powerpoint',
                                'application/mspowerpoint',
                                'application/tika-msoffice'
                        ),
                        'ppam' => array(
                                'application/ms-powerpoint.addin.macroenabled.12',
                                'application/tika-ooxml'
                        ),
                        'ppd' => array(
                                'application/cups-ppd'
                        ),
                        'ppdgz' => array(
                                'application/cups-ppd'
                        ),
                        'ppj' => array(
                                'application/xml',
                                'image/adobe.premiere'
                        ),
                        'ppkg' => array(
                                'application/xmpie.ppkg'
                        ),
                        'ppm' => array(
                                'image/portable-anymap',
                                'image/portable-pixmap'
                        ),
                        'pps' => array(
                                'application/ms-office',
                                'application/ms-powerpoint',
                                'application/mspowerpoint',
                                'application/powerpoint',
                                'application/tika-msoffice'
                        ),
                        'ppsm' => array(
                                'application/ms-powerpoint.slideshow.macroenabled.12',
                                'application/openxmlformats-officedocument.presentationml.slideshow',
                                'application/tika-ooxml'
                        ),
                        'ppsx' => array(
                                'application/openxmlformats-officedocument.presentationml.slideshow',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'ppt' => array(
                                'application/ms-office',
                                'application/ms-powerpoint',
                                'application/mspowerpoint',
                                'application/powerpoint',
                                'application/tika-msoffice'
                        ),
                        'pptm' => array(
                                'application/ms-powerpoint.presentation.macroenabled.12',
                                'application/openxmlformats-officedocument.presentationml.presentation',
                                'application/tika-ooxml'
                        ),
                        'pptx' => array(
                                'application/openxmlformats-officedocument.presentationml.presentation',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'ppz' => array(
                                'application/ms-office',
                                'application/ms-powerpoint',
                                'application/mspowerpoint',
                                'application/powerpoint',
                                'application/tika-msoffice'
                        ),
                        'pqa' => array(
                                'application/palm',
                                'application/palm-database'
                        ),
                        'prc' => array(
                                'application/mobipocket-ebook',
                                'application/palm',
                                'application/palm-database',
                                'application/pilot'
                        ),
                        'pre' => array(
                                'application/lotus-freelance'
                        ),
                        'preminet' => array(
                                'application/preminet'
                        ),
                        'prf' => array(
                                'application/pics-rules'
                        ),
                        'pro' => array(
                                'text/plain',
                                'text/prolog'
                        ),
                        'project' => array(
                                'text/plain'
                        ),
                        'properties' => array(
                                'text/java-properties',
                                'text/plain',
                                'text/properties'
                        ),
                        'provx' => array(
                                'application/provenance+xml'
                        ),
                        'prt' => array(
                                'application/prt'
                        ),
                        'prz' => array(
                                'application/lotus-freelance'
                        ),
                        'ps' => array(
                                'application/postscript',
                                'text/plain'
                        ),
                        'psb' => array(
                                'application/3gpp.pic-bw-small'
                        ),
                        'psd' => array(
                                'application/photoshop',
                                'image/adobe.photoshop',
                                'image/photoshop',
                                'image/psd'
                        ),
                        'pseg3820' => array(
                                'application/ibm.modcap'
                        ),
                        'psf' => array(
                                'application/font-linux-psf',
                                'audio/psf'
                        ),
                        'psflib' => array(
                                'audio/psf',
                                'audio/psflib'
                        ),
                        'psid' => array(
                                'audio/prs.sid'
                        ),
                        'pskcxml' => array(
                                'application/pskc+xml'
                        ),
                        'pst' => array(
                                'application/ms-outlook-pst'
                        ),
                        'psw' => array(
                                'application/pocket-word'
                        ),
                        'pti' => array(
                                'image/prs.pti'
                        ),
                        'ptid' => array(
                                'application/pvi.ptid1'
                        ),
                        'ptx' => array(
                                'image/raw-pentax'
                        ),
                        'pub' => array(
                                'application/ms-publisher',
                                'application/mspublisher',
                                'application/ole-storage'
                        ),
                        'pvb' => array(
                                'application/3gpp.pic-bw-var'
                        ),
                        'pw' => array(
                                'application/pw'
                        ),
                        'pwn' => array(
                                'application/3m.post-it-notes'
                        ),
                        'pxn' => array(
                                'image/raw-logitech'
                        ),
                        'py' => array(
                                'application/executable',
                                'text/plain',
                                'text/python',
                                'text/python3'
                        ),
                        'py3' => array(
                                'text/python',
                                'text/python3'
                        ),
                        'py3x' => array(
                                'text/python',
                                'text/python3'
                        ),
                        'pya' => array(
                                'audio/ms-playready.media.pya'
                        ),
                        'pyc' => array(
                                'application/python-bytecode'
                        ),
                        'pyo' => array(
                                'application/python-bytecode'
                        ),
                        'pyv' => array(
                                'video/ms-playready.media.pyv'
                        ),
                        'pyx' => array(
                                'application/executable',
                                'text/python'
                        ),
                        'qam' => array(
                                'application/epson.quickanime'
                        ),
                        'qbo' => array(
                                'application/intu.qbo'
                        ),
                        'qca' => array(
                                'application/ericsson.quickcall'
                        ),
                        'qcall' => array(
                                'application/ericsson.quickcall'
                        ),
                        'qfx' => array(
                                'application/intu.qfx'
                        ),
                        'qif' => array(
                                'application/qw',
                                'image/quicktime'
                        ),
                        'qml' => array(
                                'text/qml'
                        ),
                        'qmlproject' => array(
                                'text/qml'
                        ),
                        'qmltypes' => array(
                                'text/qml'
                        ),
                        'qp' => array(
                                'application/qpress'
                        ),
                        'qps' => array(
                                'application/publishare-delta-tree'
                        ),
                        'qpw' => array(
                                'application/quattro-pro'
                        ),
                        'qt' => array(
                                'application/quicktime',
                                'video/quicktime'
                        ),
                        'qti' => array(
                                'application/qtiplot',
                                'text/plain'
                        ),
                        'qtif' => array(
                                'image/quicktime'
                        ),
                        'qtl' => array(
                                'application/quicktime-media-link',
                                'application/quicktimeplayer',
                                'video/quicktime'
                        ),
                        'qtvr' => array(
                                'video/quicktime'
                        ),
                        'qwd' => array(
                                'application/quark.quarkxpress'
                        ),
                        'qwt' => array(
                                'application/quark.quarkxpress'
                        ),
                        'qxb' => array(
                                'application/quark.quarkxpress'
                        ),
                        'qxd' => array(
                                'application/quark.quarkxpress'
                        ),
                        'qxl' => array(
                                'application/quark.quarkxpress'
                        ),
                        'qxt' => array(
                                'application/quark.quarkxpress'
                        ),
                        'r3d' => array(
                                'image/raw-red'
                        ),
                        'ra' => array(
                                'audio/m-realaudio',
                                'audio/pn-realaudio',
                                'audio/realaudio',
                                'audio/rn-realaudio'
                        ),
                        'raf' => array(
                                'image/dcraw',
                                'image/fuji-raf',
                                'image/raw-fuji'
                        ),
                        'ram' => array(
                                'application/ram',
                                'audio/pn-realaudio',
                                'audio/realaudio'
                        ),
                        'raml' => array(
                                'application/raml+yaml',
                                'application/yaml'
                        ),
                        'rapd' => array(
                                'application/route-apd+xml'
                        ),
                        'rar' => array(
                                'application/rar',
                                'application/rar-compressed'
                        ),
                        'ras' => array(
                                'image/cmu-raster'
                        ),
                        'raw' => array(
                                'image/dcraw',
                                'image/panasonic-raw',
                                'image/panasonic-rw',
                                'image/raw-panasonic'
                        ),
                        'raw-disk-image' => array(
                                'application/raw-disk-image'
                        ),
                        'rax' => array(
                                'audio/m-realaudio',
                                'audio/pn-realaudio',
                                'audio/rn-realaudio'
                        ),
                        'rb' => array(
                                'application/executable',
                                'application/ruby',
                                'text/plain',
                                'text/ruby'
                        ),
                        'rcprofile' => array(
                                'application/ipunplugged.rcprofile'
                        ),
                        'rct' => array(
                                'application/prs.nprend'
                        ),
                        'rdf' => array(
                                'application/rdf+xml',
                                'application/xml',
                                'text/rdf'
                        ),
                        'rdf-crypt' => array(
                                'application/prs.rdf-xml-crypt'
                        ),
                        'rdfs' => array(
                                'application/rdf+xml',
                                'application/xml',
                                'text/rdf'
                        ),
                        'rdz' => array(
                                'application/data-vision.rdz'
                        ),
                        'reg' => array(
                                'text/ms-regedit',
                                'text/plain'
                        ),
                        'rej' => array(
                                'application/reject',
                                'text/plain',
                                'text/reject'
                        ),
                        'relo' => array(
                                'application/p2p-overlay+xml'
                        ),
                        'rep' => array(
                                'application/businessobjects',
                                'application/hcl-bireports'
                        ),
                        'req' => array(
                                'application/nervana'
                        ),
                        'request' => array(
                                'application/nervana'
                        ),
                        'res' => array(
                                'application/dtbresource+xml'
                        ),
                        'rest' => array(
                                'text/plain',
                                'text/rst'
                        ),
                        'restx' => array(
                                'text/plain',
                                'text/rst'
                        ),
                        'rexx' => array(
                                'text/plain',
                                'text/rexx'
                        ),
                        'rgb' => array(
                                'image/rgb'
                        ),
                        'rgbe' => array(
                                'image/radiance'
                        ),
                        'rif' => array(
                                'application/reginfo+xml'
                        ),
                        'rip' => array(
                                'audio/rip'
                        ),
                        'ris' => array(
                                'application/research-info-systems'
                        ),
                        'rl' => array(
                                'application/resource-lists+xml'
                        ),
                        'rlc' => array(
                                'image/fujixerox.edmics-rlc'
                        ),
                        'rld' => array(
                                'application/resource-lists-diff+xml'
                        ),
                        'rle' => array(
                                'image/rle'
                        ),
                        'rm' => array(
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr',
                                'audio/hns.audio',
                                'video/hns.video'
                        ),
                        'rmi' => array(
                                'audio/midi'
                        ),
                        'rmj' => array(
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr'
                        ),
                        'rmm' => array(
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr'
                        ),
                        'rmp' => array(
                                'audio/pn-realaudio-plugin'
                        ),
                        'rms' => array(
                                'application/jcp.javame.midlet-rms',
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr'
                        ),
                        'rmvb' => array(
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr'
                        ),
                        'rmx' => array(
                                'application/rn-realmedia',
                                'application/rn-realmedia-vbr'
                        ),
                        'rnc' => array(
                                'application/relax-ng-compact-syntax',
                                'application/rnc',
                                'text/plain'
                        ),
                        'rnd' => array(
                                'application/prs.nprend'
                        ),
                        'rng' => array(
                                'application/xml',
                                'text/plain',
                                'text/xml'
                        ),
                        'rnx' => array(
                                'text/plain'
                        ),
                        'roa' => array(
                                'application/rpki-roa'
                        ),
                        'roff' => array(
                                'application/troff',
                                'application/troff-man',
                                'application/troff-me',
                                'application/troff-ms',
                                'text/plain',
                                'text/troff'
                        ),
                        'roles' => array(
                                'text/plain'
                        ),
                        'rp' => array(
                                'image/rn-realpix'
                        ),
                        'rp9' => array(
                                'application/cloanto.rp9'
                        ),
                        'rpm' => array(
                                'application/redhat-package-manager',
                                'application/rpm'
                        ),
                        'rpss' => array(
                                'application/nokia.radio-presets'
                        ),
                        'rpst' => array(
                                'application/nokia.radio-preset'
                        ),
                        'rq' => array(
                                'application/sparql-query'
                        ),
                        'rs' => array(
                                'application/rls-services+xml',
                                'text/plain',
                                'text/rust'
                        ),
                        'rsd' => array(
                                'application/rsd+xml'
                        ),
                        'rsheet' => array(
                                'application/urc-ressheet+xml'
                        ),
                        'rsm' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'rss' => array(
                                'application/rss+xml',
                                'application/xml',
                                'text/rss'
                        ),
                        'rst' => array(
                                'text/plain',
                                'text/prs.fallenstein.rst',
                                'text/rst'
                        ),
                        'rt' => array(
                                'text/rn-realtext'
                        ),
                        'rtf' => array(
                                'application/rtf',
                                'text/plain',
                                'text/rtf'
                        ),
                        'rtx' => array(
                                'text/plain',
                                'text/richtext'
                        ),
                        'run' => array(
                                'application/makeself'
                        ),
                        'rusd' => array(
                                'application/route-usd+xml'
                        ),
                        'rv' => array(
                                'video/real-video',
                                'video/rn-realvideo'
                        ),
                        'rvx' => array(
                                'video/real-video',
                                'video/rn-realvideo'
                        ),
                        'rw2' => array(
                                'image/dcraw',
                                'image/panasonic-raw2',
                                'image/panasonic-rw2',
                                'image/raw-panasonic'
                        ),
                        'rwz' => array(
                                'image/raw-rawzor'
                        ),
                        's' => array(
                                'text/asm'
                        ),
                        's11' => array(
                                'video/sealed.mpeg1'
                        ),
                        's14' => array(
                                'video/sealed.mpeg4'
                        ),
                        's1a' => array(
                                'application/sealedmedia.softseal-pdf'
                        ),
                        's1e' => array(
                                'application/sealed-xls'
                        ),
                        's1g' => array(
                                'image/sealedmedia.softseal-gif'
                        ),
                        's1h' => array(
                                'application/sealedmedia.softseal-html'
                        ),
                        's1j' => array(
                                'image/sealedmedia.softseal-jpg'
                        ),
                        's1m' => array(
                                'audio/sealedmedia.softseal-mpeg'
                        ),
                        's1n' => array(
                                'image/sealed-png'
                        ),
                        's1p' => array(
                                'application/sealed-ppt'
                        ),
                        's1q' => array(
                                'video/sealedmedia.softseal-mov'
                        ),
                        's1w' => array(
                                'application/sealed-doc'
                        ),
                        's3df' => array(
                                'application/sealed.3df'
                        ),
                        's3m' => array(
                                'audio/s3m'
                        ),
                        's7m' => array(
                                'application/sas-dmdb'
                        ),
                        'sa7' => array(
                                'application/sas-access'
                        ),
                        'sac' => array(
                                'application/tamp-sequence-adjust-confirm'
                        ),
                        'saf' => array(
                                'application/yamaha.smaf-audio'
                        ),
                        'sam' => array(
                                'application/amipro'
                        ),
                        'sami' => array(
                                'application/sami',
                                'text/plain'
                        ),
                        'sap' => array(
                                'application/thomson-sap-image'
                        ),
                        'sas' => array(
                                'application/sas',
                                'text/plain'
                        ),
                        'sas7bacs' => array(
                                'application/sas-access'
                        ),
                        'sas7baud' => array(
                                'application/sas-audit'
                        ),
                        'sas7bbak' => array(
                                'application/sas-backup'
                        ),
                        'sas7bcat' => array(
                                'application/sas-catalog'
                        ),
                        'sas7bdat' => array(
                                'application/sas-data'
                        ),
                        'sas7bdmd' => array(
                                'application/sas-dmdb'
                        ),
                        'sas7bfdb' => array(
                                'application/sas-fdb'
                        ),
                        'sas7bitm' => array(
                                'application/sas-itemstor'
                        ),
                        'sas7bmdb' => array(
                                'application/sas-mddb'
                        ),
                        'sas7bndx' => array(
                                'application/sas-data-index'
                        ),
                        'sas7bpgm' => array(
                                'application/sas-program-data'
                        ),
                        'sas7bput' => array(
                                'application/sas-putility'
                        ),
                        'sas7butl' => array(
                                'application/sas-utility'
                        ),
                        'sas7bvew' => array(
                                'application/sas-view'
                        ),
                        'sass' => array(
                                'text/plain',
                                'text/sass'
                        ),
                        'sav' => array(
                                'application/spss-sav',
                                'application/spss-savefile'
                        ),
                        'sbml' => array(
                                'application/sbml+xml'
                        ),
                        'sc' => array(
                                'application/ibm.secure-container'
                        ),
                        'sc7' => array(
                                'application/sas-catalog'
                        ),
                        'scala' => array(
                                'text/plain',
                                'text/scala'
                        ),
                        'scd' => array(
                                'application/msschedule',
                                'application/scribus'
                        ),
                        'scdgz' => array(
                                'application/scribus'
                        ),
                        'sce' => array(
                                'application/etsi.asic-e+zip'
                        ),
                        'scld' => array(
                                'application/doremir.scorecloud-binary-document'
                        ),
                        'scm' => array(
                                'application/lotus-screencam',
                                'text/plain',
                                'text/scheme'
                        ),
                        'scope' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'scq' => array(
                                'application/scvp-cv-request'
                        ),
                        'scs' => array(
                                'application/etsi.asic-s+zip',
                                'application/scvp-cv-response'
                        ),
                        'scsf' => array(
                                'application/sealed.csf'
                        ),
                        'scss' => array(
                                'text/plain',
                                'text/scss'
                        ),
                        'scurl' => array(
                                'text/curl.scurl'
                        ),
                        'sd2' => array(
                                'application/sas-data-v6'
                        ),
                        'sd7' => array(
                                'application/sas-data'
                        ),
                        'sda' => array(
                                'application/stardivision.draw',
                                'application/tika-staroffice'
                        ),
                        'sdc' => array(
                                'application/stardivision.calc',
                                'application/tika-staroffice'
                        ),
                        'sdd' => array(
                                'application/stardivision.impress',
                                'application/tika-staroffice'
                        ),
                        'sdf' => array(
                                'application/kinar'
                        ),
                        'sdkd' => array(
                                'application/solent.sdkm+xml'
                        ),
                        'sdkm' => array(
                                'application/solent.sdkm+xml'
                        ),
                        'sdo' => array(
                                'application/sealed-doc'
                        ),
                        'sdoc' => array(
                                'application/sealed-doc'
                        ),
                        'sdp' => array(
                                'application/sdp',
                                'application/stardivision.impress',
                                'text/plain'
                        ),
                        'sds' => array(
                                'application/stardivision.chart'
                        ),
                        'sdw' => array(
                                'application/stardivision.writer',
                                'application/stardivision.writer-global',
                                'application/tika-staroffice'
                        ),
                        'sea' => array(
                                'application/sea'
                        ),
                        'sed' => array(
                                'text/plain',
                                'text/sed'
                        ),
                        'see' => array(
                                'application/seemail'
                        ),
                        'seed' => array(
                                'application/fdsn.mseed',
                                'application/fdsn.seed'
                        ),
                        'sem' => array(
                                'application/sealed-eml'
                        ),
                        'sema' => array(
                                'application/sema'
                        ),
                        'semd' => array(
                                'application/semd'
                        ),
                        'semf' => array(
                                'application/semf'
                        ),
                        'seml' => array(
                                'application/sealed-eml'
                        ),
                        'ser' => array(
                                'application/java-serialized-object'
                        ),
                        'service' => array(
                                'text/dbus-service',
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'setpay' => array(
                                'application/set-payment-initiation'
                        ),
                        'setreg' => array(
                                'application/set-registration-initiation'
                        ),
                        'sf7' => array(
                                'application/sas-fdb'
                        ),
                        'sfc' => array(
                                'application/nintendo.snes.rom',
                                'application/snes-rom'
                        ),
                        'sfd' => array(
                                'application/font-fontforge-sfd'
                        ),
                        'sfd-hdstx' => array(
                                'application/hydrostatix.sof-data'
                        ),
                        'sfdu' => array(
                                'application/sfdu',
                                'text/plain'
                        ),
                        'sfs' => array(
                                'application/spotfire.sfs'
                        ),
                        'sfv' => array(
                                'text/sfv'
                        ),
                        'sg' => array(
                                'application/sg1000-rom'
                        ),
                        'sgb' => array(
                                'application/gameboy-rom'
                        ),
                        'sgf' => array(
                                'application/go-sgf',
                                'text/plain'
                        ),
                        'sgi' => array(
                                'image/sealedmedia.softseal-gif',
                                'image/sgi'
                        ),
                        'sgif' => array(
                                'image/sealedmedia.softseal-gif'
                        ),
                        'sgl' => array(
                                'application/stardivision.writer',
                                'application/stardivision.writer-global'
                        ),
                        'sgm' => array(
                                'text/plain',
                                'text/sgml'
                        ),
                        'sgml' => array(
                                'text/plain',
                                'text/sgml'
                        ),
                        'sh' => array(
                                'application/executable',
                                'application/sh',
                                'application/shellscript',
                                'text/plain',
                                'text/sh'
                        ),
                        'shape' => array(
                                'application/dia-shape',
                                'application/xml'
                        ),
                        'shar' => array(
                                'application/shar'
                        ),
                        'shf' => array(
                                'application/shf+xml'
                        ),
                        'shn' => array(
                                'application/shorten',
                                'audio/shorten'
                        ),
                        'shp' => array(
                                'application/shapefile'
                        ),
                        'shtml' => array(
                                'text/html'
                        ),
                        'shw' => array(
                                'application/corelpresentations',
                                'application/tika-msoffice'
                        ),
                        'si7' => array(
                                'application/sas-data-index'
                        ),
                        'siag' => array(
                                'application/siag'
                        ),
                        'sid' => array(
                                'audio/prs.sid',
                                'image/mrsid-image'
                        ),
                        'sig' => array(
                                'application/pgp-signature',
                                'text/plain'
                        ),
                        'sik' => array(
                                'application/trash'
                        ),
                        'sil' => array(
                                'audio/silk'
                        ),
                        'silo' => array(
                                'model/mesh'
                        ),
                        'sis' => array(
                                'application/symbian.install'
                        ),
                        'sisx' => array(
                                'application/symbian.install',
                                'x-epoc/sisx-app'
                        ),
                        'sit' => array(
                                'application/sit',
                                'application/stuffit'
                        ),
                        'sitx' => array(
                                'application/stuffitx'
                        ),
                        'siv' => array(
                                'application/sieve',
                                'application/xml'
                        ),
                        'sjp' => array(
                                'image/sealedmedia.softseal-jpg'
                        ),
                        'sjpg' => array(
                                'image/sealedmedia.softseal-jpg'
                        ),
                        'sk' => array(
                                'image/skencil'
                        ),
                        'sk1' => array(
                                'image/skencil'
                        ),
                        'skd' => array(
                                'application/koan'
                        ),
                        'skm' => array(
                                'application/koan'
                        ),
                        'skp' => array(
                                'application/koan'
                        ),
                        'skr' => array(
                                'application/pgp-keys',
                                'text/plain'
                        ),
                        'skt' => array(
                                'application/koan'
                        ),
                        'sla' => array(
                                'application/scribus'
                        ),
                        'slagz' => array(
                                'application/scribus'
                        ),
                        'slaz' => array(
                                'application/scribus'
                        ),
                        'sldasm' => array(
                                'application/sldworks',
                                'application/tika-msoffice'
                        ),
                        'slddrw' => array(
                                'application/sldworks',
                                'application/tika-msoffice'
                        ),
                        'sldm' => array(
                                'application/ms-powerpoint.slide.macroenabled.12',
                                'application/openxmlformats-officedocument.presentationml.slide',
                                'application/tika-ooxml'
                        ),
                        'sldprt' => array(
                                'application/sldworks',
                                'application/tika-msoffice'
                        ),
                        'sldx' => array(
                                'application/openxmlformats-officedocument.presentationml.slide',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'slice' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'slk' => array(
                                'text/plain',
                                'text/spreadsheet'
                        ),
                        'sls' => array(
                                'application/route-s-tsid+xml'
                        ),
                        'slt' => array(
                                'application/epson.salt'
                        ),
                        'sm' => array(
                                'application/stepmania.stepchart'
                        ),
                        'sm7' => array(
                                'application/sas-mddb'
                        ),
                        'smaf' => array(
                                'application/smaf'
                        ),
                        'smc' => array(
                                'application/nintendo.snes.rom',
                                'application/snes-rom'
                        ),
                        'smd' => array(
                                'application/genesis-rom',
                                'application/stardivision.mail'
                        ),
                        'smf' => array(
                                'application/stardivision.math'
                        ),
                        'smh' => array(
                                'application/sealed-mht'
                        ),
                        'smht' => array(
                                'application/sealed-mht'
                        ),
                        'smi' => array(
                                'application/sami',
                                'application/smil',
                                'application/smil+xml',
                                'application/xml',
                                'text/plain'
                        ),
                        'smil' => array(
                                'application/smil',
                                'application/smil+xml',
                                'application/xml'
                        ),
                        'sml' => array(
                                'application/smil',
                                'application/smil+xml',
                                'application/xml'
                        ),
                        'smo' => array(
                                'video/sealedmedia.softseal-mov'
                        ),
                        'smov' => array(
                                'video/sealedmedia.softseal-mov'
                        ),
                        'smp' => array(
                                'audio/sealedmedia.softseal-mpeg'
                        ),
                        'smp3' => array(
                                'audio/sealedmedia.softseal-mpeg'
                        ),
                        'smpg' => array(
                                'video/sealed.mpeg1',
                                'video/sealed.mpeg4'
                        ),
                        'sms' => array(
                                'application/3gpp.sms',
                                'application/3gpp2.sms',
                                'application/sms-rom'
                        ),
                        'smv' => array(
                                'video/smv'
                        ),
                        'smzip' => array(
                                'application/stepmania.package'
                        ),
                        'snap' => array(
                                'application/snap',
                                'application/squashfs'
                        ),
                        'snd' => array(
                                'audio/basic'
                        ),
                        'snf' => array(
                                'application/font-snf'
                        ),
                        'so' => array(
                                'application/octet-stream',
                                'application/sharedlib'
                        ),
                        'socket' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'sp7' => array(
                                'application/sas-putility'
                        ),
                        'spc' => array(
                                'application/pkcs7-certificates'
                        ),
                        'spd' => array(
                                'application/font-speedo',
                                'application/sealedmedia.softseal-pdf'
                        ),
                        'spdf' => array(
                                'application/sealedmedia.softseal-pdf'
                        ),
                        'spec' => array(
                                'text/plain',
                                'text/rpm-spec'
                        ),
                        'spf' => array(
                                'application/yamaha.smaf-phrase'
                        ),
                        'spl' => array(
                                'application/adobe.flash.movie',
                                'application/futuresplash',
                                'application/shockwave-flash'
                        ),
                        'spm' => array(
                                'application/rpm',
                                'application/source-rpm'
                        ),
                        'spn' => array(
                                'image/sealed-png'
                        ),
                        'spng' => array(
                                'image/sealed-png'
                        ),
                        'spo' => array(
                                'text/in3d.spot'
                        ),
                        'spot' => array(
                                'text/in3d.spot'
                        ),
                        'spp' => array(
                                'application/scvp-vp-response',
                                'application/sealed-ppt'
                        ),
                        'sppt' => array(
                                'application/sealed-ppt'
                        ),
                        'spq' => array(
                                'application/scvp-vp-request'
                        ),
                        'spx' => array(
                                'application/speex',
                                'audio/ogg',
                                'audio/speex'
                        ),
                        'sql' => array(
                                'application/sql',
                                'text/plain',
                                'text/sql'
                        ),
                        'sqsh' => array(
                                'application/squashfs'
                        ),
                        'sr' => array(
                                'application/sigrok.session'
                        ),
                        'sr2' => array(
                                'image/dcraw',
                                'image/raw-sony',
                                'image/sony-sr2'
                        ),
                        'sr7' => array(
                                'application/sas-itemstor'
                        ),
                        'src' => array(
                                'application/wais-source',
                                'text/plain'
                        ),
                        'srf' => array(
                                'image/dcraw',
                                'image/raw-sony',
                                'image/sony-srf'
                        ),
                        'srl' => array(
                                'application/sereal'
                        ),
                        'srt' => array(
                                'application/srt',
                                'application/subrip',
                                'text/plain'
                        ),
                        'sru' => array(
                                'application/sru+xml'
                        ),
                        'srx' => array(
                                'application/sparql-results+xml'
                        ),
                        'ss' => array(
                                'text/plain',
                                'text/scheme'
                        ),
                        'ss7' => array(
                                'application/sas-program-data'
                        ),
                        'ssa' => array(
                                'text/plain',
                                'text/ssa'
                        ),
                        'ssdl' => array(
                                'application/ssdl+xml'
                        ),
                        'sse' => array(
                                'application/kodak-descriptor'
                        ),
                        'ssf' => array(
                                'application/epson.ssf'
                        ),
                        'ssml' => array(
                                'application/ssml+xml'
                        ),
                        'ssw' => array(
                                'video/sealed-swf'
                        ),
                        'sswf' => array(
                                'video/sealed-swf'
                        ),
                        'st' => array(
                                'application/sailingtracker.track',
                                'text/plain',
                                'text/stsrc'
                        ),
                        'st7' => array(
                                'application/sas-audit'
                        ),
                        'stc' => array(
                                'application/sun.xml.calc.template',
                                'application/zip'
                        ),
                        'std' => array(
                                'application/sun.xml.draw.template',
                                'application/zip'
                        ),
                        'stf' => array(
                                'application/wt.stf'
                        ),
                        'sti' => array(
                                'application/sun.xml.impress.template',
                                'application/zip'
                        ),
                        'stif' => array(
                                'application/sealed-tiff'
                        ),
                        'stk' => array(
                                'application/hyperstudio'
                        ),
                        'stl' => array(
                                'application/ms-pki.stl',
                                'model/x.stl-ascii',
                                'model/x.stl-binary',
                                'text/plain'
                        ),
                        'stm' => array(
                                'application/sealedmedia.softseal-html',
                                'audio/stm'
                        ),
                        'stml' => array(
                                'application/sealedmedia.softseal-html'
                        ),
                        'str' => array(
                                'application/pg.format'
                        ),
                        'study-inter' => array(
                                'application/vd-study'
                        ),
                        'stw' => array(
                                'application/sun.xml.writer.template',
                                'application/zip'
                        ),
                        'stx' => array(
                                'application/sas-transport'
                        ),
                        'sty' => array(
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'su7' => array(
                                'application/sas-utility'
                        ),
                        'sub' => array(
                                'image/dvb.subtitle',
                                'text/dvb.subtitle',
                                'text/microdvd',
                                'text/mpsub',
                                'text/plain',
                                'text/subviewer'
                        ),
                        'sun' => array(
                                'image/sun-raster'
                        ),
                        'sus' => array(
                                'application/sus-calendar'
                        ),
                        'susp' => array(
                                'application/sus-calendar'
                        ),
                        'sv' => array(
                                'text/svsrc',
                                'text/verilog'
                        ),
                        'sv4cpio' => array(
                                'application/sv4cpio'
                        ),
                        'sv4crc' => array(
                                'application/sv4crc'
                        ),
                        'sv7' => array(
                                'application/sas-view'
                        ),
                        'svc' => array(
                                'application/dvb.service',
                                'application/dvbservice'
                        ),
                        'svd' => array(
                                'application/svd'
                        ),
                        'svg' => array(
                                'application/xml',
                                'image/svg+xml'
                        ),
                        'svgz' => array(
                                'application/gzip',
                                'application/xml',
                                'image/svg+xml',
                                'image/svg+xml-compressed'
                        ),
                        'svh' => array(
                                'text/svhdr',
                                'text/verilog'
                        ),
                        'swa' => array(
                                'application/director'
                        ),
                        'swap' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'swf' => array(
                                'application/adobe.flash.movie',
                                'application/futuresplash',
                                'application/shockwave-flash'
                        ),
                        'swi' => array(
                                'application/arastra.swi',
                                'application/aristanetworks.swi'
                        ),
                        'swm' => array(
                                'application/ms-wim'
                        ),
                        'sxc' => array(
                                'application/sun.xml.calc',
                                'application/zip'
                        ),
                        'sxd' => array(
                                'application/sun.xml.draw',
                                'application/zip'
                        ),
                        'sxg' => array(
                                'application/sun.xml.writer.global',
                                'application/zip'
                        ),
                        'sxi' => array(
                                'application/sun.xml.impress',
                                'application/vd-study',
                                'application/zip'
                        ),
                        'sxl' => array(
                                'application/sealed-xls'
                        ),
                        'sxls' => array(
                                'application/sealed-xls'
                        ),
                        'sxm' => array(
                                'application/sun.xml.math',
                                'application/zip'
                        ),
                        'sxw' => array(
                                'application/sun.xml.writer',
                                'application/vnd.sun.xml.writer',
                                'application/zip'
                        ),
                        'sylk' => array(
                                'text/plain',
                                'text/spreadsheet'
                        ),
                        'sz' => array(
                                'application/snappy-framed'
                        ),
                        't' => array(
                                'text/troff'
                        ),
                        't2t' => array(
                                'text/plain',
                                'text/txt2tags'
                        ),
                        't3' => array(
                                'application/t3vm-image'
                        ),
                        't38' => array(
                                'image/t38'
                        ),
                        'taglet' => array(
                                'application/mynfc'
                        ),
                        'tam' => array(
                                'application/onepager'
                        ),
                        'tamp' => array(
                                'application/onepagertamp'
                        ),
                        'tamx' => array(
                                'application/onepagertamx'
                        ),
                        'tao' => array(
                                'application/tao.intent-module-archive'
                        ),
                        'tap' => array(
                                'image/tencent.tap'
                        ),
                        'tar' => array(
                                'application/gtar',
                                'application/tar'
                        ),
                        'target' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'tat' => array(
                                'application/onepagertat'
                        ),
                        'tatp' => array(
                                'application/onepagertatp'
                        ),
                        'tatx' => array(
                                'application/onepagertatx'
                        ),
                        'tau' => array(
                                'application/tamp-apex-update'
                        ),
                        'taz' => array(
                                'application/compress',
                                'application/tarz'
                        ),
                        'tb2' => array(
                                'application/bzip',
                                'application/bzip-compressed-tar'
                        ),
                        'tbz' => array(
                                'application/bzip',
                                'application/bzip-compressed-tar'
                        ),
                        'tbz2' => array(
                                'application/bzip',
                                'application/bzip-compressed-tar',
                                'application/bzip2'
                        ),
                        'tcap' => array(
                                'application/3gpp2.tcap'
                        ),
                        'tcl' => array(
                                'application/tcl',
                                'text/plain',
                                'text/tcl'
                        ),
                        'tcsh' => array(
                                'application/csh'
                        ),
                        'tcu' => array(
                                'application/tamp-community-update'
                        ),
                        'teacher' => array(
                                'application/smart.teacher'
                        ),
                        'tei' => array(
                                'application/tei+xml'
                        ),
                        'teicorpus' => array(
                                'application/tei+xml'
                        ),
                        'ter' => array(
                                'application/tamp-error'
                        ),
                        'tex' => array(
                                'application/tex',
                                'text/plain',
                                'text/tex'
                        ),
                        'texi' => array(
                                'application/texinfo',
                                'text/plain',
                                'text/texinfo'
                        ),
                        'texinfo' => array(
                                'application/texinfo',
                                'text/plain',
                                'text/texinfo'
                        ),
                        'text' => array(
                                'text/plain'
                        ),
                        'tfi' => array(
                                'application/thraud+xml'
                        ),
                        'tfm' => array(
                                'application/tex-tfm'
                        ),
                        'tfx' => array(
                                'image/tiff-fx'
                        ),
                        'tga' => array(
                                'image/icb',
                                'image/tga'
                        ),
                        'tgz' => array(
                                'application/compressed-tar',
                                'application/gunzip',
                                'application/gzip',
                                'application/gzip-compressed',
                                'application/gzipped',
                                'gzip/document'
                        ),
                        'the' => array(
                                'message/global-headers'
                        ),
                        'theme' => array(
                                'application/desktop',
                                'application/theme'
                        ),
                        'themepack' => array(
                                'application/ms-cab-compressed',
                                'application/windows-themepack'
                        ),
                        'thmx' => array(
                                'application/ms-officetheme',
                                'application/openxmlformats-officedocument.presentationml.presentation',
                                'application/tika-ooxml'
                        ),
                        'tif' => array(
                                'image/tiff'
                        ),
                        'tiff' => array(
                                'image/tiff'
                        ),
                        'timer' => array(
                                'text/plain',
                                'text/systemd-unit'
                        ),
                        'tk' => array(
                                'application/tcl',
                                'text/plain',
                                'text/tcl'
                        ),
                        'tlclient' => array(
                                'application/cendio.thinlinc.clientconf'
                        ),
                        'tld' => array(
                                'text/plain'
                        ),
                        'tlrz' => array(
                                'application/lrzip',
                                'application/lrzip-compressed-tar'
                        ),
                        'tlz' => array(
                                'application/lzma',
                                'application/lzma-compressed-tar'
                        ),
                        'tmo' => array(
                                'application/tmobile-livetv'
                        ),
                        'tnef' => array(
                                'application/ms-tnef'
                        ),
                        'tnf' => array(
                                'application/ms-tnef'
                        ),
                        'toast' => array(
                                'application/iso9660-image',
                                'application/roxio-toast'
                        ),
                        'toc' => array(
                                'application/cdrdao-toc',
                                'text/plain'
                        ),
                        'torrent' => array(
                                'application/bittorrent'
                        ),
                        'tpic' => array(
                                'image/icb',
                                'image/tga'
                        ),
                        'tpl' => array(
                                'application/groove-tool-template'
                        ),
                        'tpt' => array(
                                'application/trid.tpt'
                        ),
                        'tr' => array(
                                'application/troff',
                                'application/troff-man',
                                'application/troff-me',
                                'application/troff-ms',
                                'text/plain',
                                'text/troff'
                        ),
                        'tra' => array(
                                'application/trueapp'
                        ),
                        'tree' => array(
                                'application/rainstor.data'
                        ),
                        'trig' => array(
                                'application/trig',
                                'text/plain'
                        ),
                        'trm' => array(
                                'application/msterminal'
                        ),
                        'ts' => array(
                                'application/linguist',
                                'application/xml',
                                'text/trolltech.linguist',
                                'video/mp2t'
                        ),
                        'tsa' => array(
                                'application/tamp-sequence-adjust'
                        ),
                        'tsd' => array(
                                'application/timestamped-data'
                        ),
                        'tsq' => array(
                                'application/tamp-status-query'
                        ),
                        'tsr' => array(
                                'application/tamp-status-response'
                        ),
                        'tst' => array(
                                'application/etsi.timestamp-token'
                        ),
                        'tsv' => array(
                                'text/plain',
                                'text/tab-separated-values'
                        ),
                        'tta' => array(
                                'audio/tta'
                        ),
                        'ttc' => array(
                                'application/font-ttf',
                                'font/collection'
                        ),
                        'ttf' => array(
                                'application/font-ttf',
                                'font/ttf'
                        ),
                        'ttl' => array(
                                'text/plain',
                                'text/turtle'
                        ),
                        'ttml' => array(
                                'application/ttml+xml'
                        ),
                        'ttx' => array(
                                'application/font-ttx',
                                'application/xml'
                        ),
                        'tuc' => array(
                                'application/tamp-update-confirm'
                        ),
                        'tur' => array(
                                'application/tamp-update'
                        ),
                        'twd' => array(
                                'application/simtech-mindmapper'
                        ),
                        'twds' => array(
                                'application/simtech-mindmapper'
                        ),
                        'twig' => array(
                                'text/plain',
                                'text/twig'
                        ),
                        'txd' => array(
                                'application/genomatix.tuxedo'
                        ),
                        'txf' => array(
                                'application/mobius.txf'
                        ),
                        'txt' => array(
                                'text/plain',
                                'text/prs.fallenstein.rst',
                                'text/prs.prop.logic'
                        ),
                        'txz' => array(
                                'application/xz',
                                'application/xz-compressed-tar'
                        ),
                        'types' => array(
                                'text/plain'
                        ),
                        'tzo' => array(
                                'application/lzop',
                                'application/tzo'
                        ),
                        'u32' => array(
                                'application/authorware-bin'
                        ),
                        'uc2' => array(
                                'application/uc2-compressed'
                        ),
                        'udeb' => array(
                                'application/archive',
                                'application/deb',
                                'application/debian-package',
                                'application/debian.binary-package'
                        ),
                        'ufd' => array(
                                'application/ufdl'
                        ),
                        'ufdl' => array(
                                'application/ufdl'
                        ),
                        'ufraw' => array(
                                'application/ufraw',
                                'application/xml'
                        ),
                        'ui' => array(
                                'application/designer',
                                'application/gtk-builder',
                                'application/xml'
                        ),
                        'uil' => array(
                                'text/plain',
                                'text/uil'
                        ),
                        'ult' => array(
                                'audio/mod'
                        ),
                        'ulx' => array(
                                'application/glulx'
                        ),
                        'umj' => array(
                                'application/umajin'
                        ),
                        'unf' => array(
                                'application/nes-rom'
                        ),
                        'uni' => array(
                                'audio/mod'
                        ),
                        'unif' => array(
                                'application/nes-rom'
                        ),
                        'unityweb' => array(
                                'application/unity'
                        ),
                        'uo' => array(
                                'application/uoml+xml'
                        ),
                        'uoml' => array(
                                'application/uoml+xml'
                        ),
                        'uri' => array(
                                'text/uri-list'
                        ),
                        'uric' => array(
                                'text/si.uricatalogue'
                        ),
                        'urim' => array(
                                'application/uri-map'
                        ),
                        'uris' => array(
                                'text/uri-list'
                        ),
                        'url' => array(
                                'application/mswinurl'
                        ),
                        'urls' => array(
                                'text/uri-list'
                        ),
                        'ustar' => array(
                                'application/ustar'
                        ),
                        'utz' => array(
                                'application/uiq.theme'
                        ),
                        'uu' => array(
                                'text/uuencode'
                        ),
                        'uue' => array(
                                'text/plain',
                                'text/uuencode',
                                'zz-application/zz-winassoc-uu'
                        ),
                        'uva' => array(
                                'audio/dece.audio'
                        ),
                        'uvd' => array(
                                'application/dece.data'
                        ),
                        'uvf' => array(
                                'application/dece.data'
                        ),
                        'uvg' => array(
                                'image/dece.graphic'
                        ),
                        'uvh' => array(
                                'video/dece.hd'
                        ),
                        'uvi' => array(
                                'image/dece.graphic'
                        ),
                        'uvm' => array(
                                'video/dece.mobile'
                        ),
                        'uvp' => array(
                                'video/dece.pd'
                        ),
                        'uvs' => array(
                                'video/dece.sd'
                        ),
                        'uvt' => array(
                                'application/dece.ttml+xml'
                        ),
                        'uvu' => array(
                                'video/dece-mp4',
                                'video/uvvu-mp4',
                                'video/uvvu.mp4'
                        ),
                        'uvv' => array(
                                'video/dece.video'
                        ),
                        'uvva' => array(
                                'audio/dece.audio'
                        ),
                        'uvvd' => array(
                                'application/dece.data'
                        ),
                        'uvvf' => array(
                                'application/dece.data'
                        ),
                        'uvvg' => array(
                                'image/dece.graphic'
                        ),
                        'uvvh' => array(
                                'video/dece.hd'
                        ),
                        'uvvi' => array(
                                'image/dece.graphic'
                        ),
                        'uvvm' => array(
                                'video/dece.mobile'
                        ),
                        'uvvp' => array(
                                'video/dece.pd'
                        ),
                        'uvvs' => array(
                                'video/dece.sd'
                        ),
                        'uvvt' => array(
                                'application/dece.ttml+xml'
                        ),
                        'uvvu' => array(
                                'video/dece-mp4',
                                'video/uvvu-mp4',
                                'video/uvvu.mp4'
                        ),
                        'uvvv' => array(
                                'video/dece.video'
                        ),
                        'uvvx' => array(
                                'application/dece.unspecified'
                        ),
                        'uvvz' => array(
                                'application/dece.zip'
                        ),
                        'uvx' => array(
                                'application/dece.unspecified'
                        ),
                        'uvz' => array(
                                'application/dece.zip'
                        ),
                        'v64' => array(
                                'application/n64-rom'
                        ),
                        'vala' => array(
                                'text/csrc',
                                'text/vala'
                        ),
                        'vapi' => array(
                                'text/csrc',
                                'text/vala'
                        ),
                        'vb' => array(
                                'application/virtual-boy-rom',
                                'text/vbasic',
                                'text/vbdotnet'
                        ),
                        'vbk' => array(
                                'audio/nortel.vbk'
                        ),
                        'vbs' => array(
                                'text/vbasic',
                                'text/vbscript'
                        ),
                        'vcard' => array(
                                'text/directory',
                                'text/plain',
                                'text/vcard'
                        ),
                        'vcd' => array(
                                'application/cdlink'
                        ),
                        'vcf' => array(
                                'text/directory',
                                'text/plain',
                                'text/vcard'
                        ),
                        'vcg' => array(
                                'application/groove-vcard'
                        ),
                        'vcs' => array(
                                'application/ics',
                                'text/calendar',
                                'text/plain',
                                'text/vcalendar'
                        ),
                        'vct' => array(
                                'text/directory',
                                'text/plain',
                                'text/vcard'
                        ),
                        'vcx' => array(
                                'application/vcx'
                        ),
                        'vda' => array(
                                'image/icb',
                                'image/tga'
                        ),
                        'vfr' => array(
                                'application/tml'
                        ),
                        'vhd' => array(
                                'text/plain',
                                'text/vhdl'
                        ),
                        'vhdl' => array(
                                'text/plain',
                                'text/vhdl'
                        ),
                        'viaframe' => array(
                                'application/tml'
                        ),
                        'vis' => array(
                                'application/informix-visionary',
                                'application/visionary'
                        ),
                        'viv' => array(
                                'video/vivo'
                        ),
                        'vivo' => array(
                                'video/vivo'
                        ),
                        'vlc' => array(
                                'application/m3u',
                                'audio/m3u',
                                'audio/mp3-playlist',
                                'audio/mpegurl',
                                'text/plain'
                        ),
                        'vm' => array(
                                'text/plain'
                        ),
                        'vmdk' => array(
                                'application/vmdk'
                        ),
                        'vmt' => array(
                                'application/valve.source.material'
                        ),
                        'vob' => array(
                                'video/mpeg',
                                'video/mpeg-system',
                                'video/mpeg2',
                                'video/ms-vob'
                        ),
                        'voc' => array(
                                'audio/voc'
                        ),
                        'vor' => array(
                                'application/stardivision.writer',
                                'application/stardivision.writer-global',
                                'application/staroffice-template',
                                'application/tika-staroffice'
                        ),
                        'vox' => array(
                                'application/authorware-bin'
                        ),
                        'vpm' => array(
                                'multipart/voice-message'
                        ),
                        'vrm' => array(
                                'model/vrml',
                                'text/plain'
                        ),
                        'vrml' => array(
                                'model/vrml',
                                'text/plain'
                        ),
                        'vsc' => array(
                                'application/vidsoft.vidconference',
                                'application/vividence.scriptfile'
                        ),
                        'vsd' => array(
                                'application/ms-visio',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/visio'
                        ),
                        'vsdm' => array(
                                'application/ms-visio.drawing.macroenabled.12',
                                'application/ms-visio.drawing.macroenabled.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vsdx' => array(
                                'application/ms-visio.drawing',
                                'application/ms-visio.drawing.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vsf' => array(
                                'application/vsf'
                        ),
                        'vsl' => array(
                                'text/plain'
                        ),
                        'vss' => array(
                                'application/ms-visio',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/visio'
                        ),
                        'vssm' => array(
                                'application/ms-visio.stencil.macroenabled.12',
                                'application/ms-visio.stencil.macroenabled.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vssx' => array(
                                'application/ms-visio.stencil',
                                'application/ms-visio.stencil.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vst' => array(
                                'application/ms-visio',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/visio',
                                'image/icb',
                                'image/tga'
                        ),
                        'vstm' => array(
                                'application/ms-visio.template.macroenabled.12',
                                'application/ms-visio.template.macroenabled.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vstx' => array(
                                'application/ms-visio.template',
                                'application/ms-visio.template.main+xml',
                                'application/tika-visio-ooxml',
                                'application/zip'
                        ),
                        'vsw' => array(
                                'application/ms-visio',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/visio'
                        ),
                        'vtf' => array(
                                'image/valve.source.texture'
                        ),
                        'vtt' => array(
                                'text/plain',
                                'text/vtt'
                        ),
                        'vtu' => array(
                                'model/vtu'
                        ),
                        'vwx' => array(
                                'application/vectorworks'
                        ),
                        'vxm' => array(
                                'application/ccxml+xml',
                                'application/pls+xml',
                                'application/srgs+xml',
                                'application/ssml+xml',
                                'application/voicexml+xml'
                        ),
                        'vxml' => array(
                                'application/voicexml+xml'
                        ),
                        'w3d' => array(
                                'application/director'
                        ),
                        'w60' => array(
                                'application/wordperfect'
                        ),
                        'wad' => array(
                                'application/doom',
                                'application/doom-wad',
                                'application/wii-wad'
                        ),
                        'wadl' => array(
                                'application/sun.wadl+xml'
                        ),
                        'war' => array(
                                'application/java-archive',
                                'application/tika-java-web-archive'
                        ),
                        'warc' => array(
                                'application/warc'
                        ),
                        'wav' => array(
                                'audio/dts',
                                'audio/wav',
                                'audio/wave'
                        ),
                        'wax' => array(
                                'application/ms-asx',
                                'audio/ms-asx',
                                'audio/ms-wax',
                                'video/ms-wax',
                                'video/ms-wmx',
                                'video/ms-wvx'
                        ),
                        'wb1' => array(
                                'application/quattro-pro',
                                'application/quattropro'
                        ),
                        'wb2' => array(
                                'application/quattro-pro',
                                'application/quattropro'
                        ),
                        'wb3' => array(
                                'application/quattro-pro',
                                'application/quattropro'
                        ),
                        'wbmp' => array(
                                'image/vnd-wap-wbmp',
                                'image/wap.wbmp'
                        ),
                        'wbs' => array(
                                'application/criticaltools.wbs+xml'
                        ),
                        'wbxml' => array(
                                'application/wap-wbxml',
                                'application/wap.wbxml'
                        ),
                        'wcm' => array(
                                'application/ms-works',
                                'application/ole-storage',
                                'application/tika-msoffice'
                        ),
                        'wdb' => array(
                                'application/ms-works',
                                'application/ole-storage',
                                'application/tika-msoffice'
                        ),
                        'wdp' => array(
                                'image/ms-photo'
                        ),
                        'weba' => array(
                                'audio/webm'
                        ),
                        'webarchive' => array(
                                'application/bplist',
                                'application/webarchive'
                        ),
                        'webm' => array(
                                'application/matroska',
                                'video/webm'
                        ),
                        'webp' => array(
                                'image/webp'
                        ),
                        'wg' => array(
                                'application/pmi.widget'
                        ),
                        'wgt' => array(
                                'application/widget'
                        ),
                        'wif' => array(
                                'application/watcherinfo+xml'
                        ),
                        'wim' => array(
                                'application/ms-wim'
                        ),
                        'win' => array(
                                'model/gdl',
                                'model/gs-gdl'
                        ),
                        'wk1' => array(
                                'application/123',
                                'application/lotus-1-2-3',
                                'application/lotus123',
                                'application/wk1',
                                'zz-application/zz-winassoc-123'
                        ),
                        'wk3' => array(
                                'application/123',
                                'application/lotus-1-2-3',
                                'application/lotus123',
                                'application/wk1',
                                'zz-application/zz-winassoc-123'
                        ),
                        'wk4' => array(
                                'application/123',
                                'application/lotus-1-2-3',
                                'application/lotus123',
                                'application/wk1',
                                'zz-application/zz-winassoc-123'
                        ),
                        'wkdownload' => array(
                                'application/partial-download'
                        ),
                        'wks' => array(
                                'application/123',
                                'application/lotus-1-2-3',
                                'application/lotus123',
                                'application/ms-works',
                                'application/ole-storage',
                                'application/tika-msoffice',
                                'application/wk1',
                                'zz-application/zz-winassoc-123'
                        ),
                        'wm' => array(
                                'video/ms-wm'
                        ),
                        'wma' => array(
                                'application/ms-asf',
                                'audio/ms-wma',
                                'audio/wma',
                                'video/ms-asf'
                        ),
                        'wmc' => array(
                                'application/wmc'
                        ),
                        'wmd' => array(
                                'application/ms-wmd'
                        ),
                        'wmf' => array(
                                'application/msmetafile',
                                'application/wmf',
                                'image/win-metafile',
                                'image/wmf'
                        ),
                        'wml' => array(
                                'application/xml',
                                'text/wap.wml'
                        ),
                        'wmlc' => array(
                                'application/wap.wmlc'
                        ),
                        'wmls' => array(
                                'text/wap.wmlscript'
                        ),
                        'wmlsc' => array(
                                'application/wap.wmlscriptc'
                        ),
                        'wmv' => array(
                                'application/ms-asf',
                                'video/ms-asf',
                                'video/ms-wmv'
                        ),
                        'wmx' => array(
                                'application/ms-asx',
                                'audio/ms-asx',
                                'video/ms-wax',
                                'video/ms-wmx',
                                'video/ms-wvx'
                        ),
                        'wmz' => array(
                                'application/gzip',
                                'application/ms-wmz',
                                'application/msmetafile'
                        ),
                        'woff' => array(
                                'application/font-woff',
                                'font/woff'
                        ),
                        'woff2' => array(
                                'font/woff',
                                'font/woff2'
                        ),
                        'wp' => array(
                                'application/wordperfect'
                        ),
                        'wp4' => array(
                                'application/wordperfect'
                        ),
                        'wp5' => array(
                                'application/wordperfect'
                        ),
                        'wp6' => array(
                                'application/wordperfect'
                        ),
                        'wp61' => array(
                                'application/wordperfect'
                        ),
                        'wpd' => array(
                                'application/wordperfect'
                        ),
                        'wpg' => array(
                                'application/wpg'
                        ),
                        'wpl' => array(
                                'application/ms-wpl'
                        ),
                        'wpp' => array(
                                'application/wordperfect'
                        ),
                        'wps' => array(
                                'application/ms-works',
                                'application/ole-storage',
                                'application/tika-msoffice'
                        ),
                        'wpt' => array(
                                'application/wordperfect'
                        ),
                        'wqd' => array(
                                'application/wqd'
                        ),
                        'wri' => array(
                                'application/mswrite'
                        ),
                        'wrl' => array(
                                'model/vrml',
                                'text/plain'
                        ),
                        'ws' => array(
                                'application/wonderswan-rom'
                        ),
                        'wsc' => array(
                                'application/wfa.wsc',
                                'application/wonderswan-color-rom',
                                'message/wfa.wsc'
                        ),
                        'wsdd' => array(
                                'text/plain'
                        ),
                        'wsdl' => array(
                                'application/wsdl+xml'
                        ),
                        'wsgi' => array(
                                'application/executable',
                                'text/python'
                        ),
                        'wspolicy' => array(
                                'application/wspolicy+xml'
                        ),
                        'wtb' => array(
                                'application/webturbo'
                        ),
                        'wv' => array(
                                'application/wv.csp+wbxml',
                                'audio/wavpack'
                        ),
                        'wvc' => array(
                                'audio/wavpack-correction'
                        ),
                        'wvp' => array(
                                'audio/wavpack'
                        ),
                        'wvx' => array(
                                'application/ms-asx',
                                'audio/ms-asx',
                                'video/ms-wax',
                                'video/ms-wmx',
                                'video/ms-wvx'
                        ),
                        'wwf' => array(
                                'application/pdf',
                                'application/wwf'
                        ),
                        'x32' => array(
                                'application/authorware-bin'
                        ),
                        'x3d' => array(
                                'application/hzn-3d-crossword',
                                'model/x3d+xml'
                        ),
                        'x3db' => array(
                                'model/x3d+binary',
                                'model/x3d+fastinfoset'
                        ),
                        'x3dbz' => array(
                                'model/x3d+binary'
                        ),
                        'x3dv' => array(
                                'model/x3d+vrml',
                                'model/x3d-vrml'
                        ),
                        'x3dvz' => array(
                                'model/x3d+vrml'
                        ),
                        'x3dz' => array(
                                'model/x3d+xml'
                        ),
                        'x3f' => array(
                                'image/dcraw',
                                'image/raw-sigma',
                                'image/sigma-x3f'
                        ),
                        'x_b' => array(
                                'model/parasolid.transmit-binary'
                        ),
                        'x_t' => array(
                                'model/parasolid.transmit-text'
                        ),
                        'xac' => array(
                                'application/gnucash'
                        ),
                        'xaml' => array(
                                'application/xaml+xml'
                        ),
                        'xap' => array(
                                'application/silverlight-app'
                        ),
                        'xar' => array(
                                'application/xar',
                                'application/xara'
                        ),
                        'xargs' => array(
                                'text/plain'
                        ),
                        'xav' => array(
                                'application/xcap-att+xml'
                        ),
                        'xbap' => array(
                                'application/ms-xbap'
                        ),
                        'xbd' => array(
                                'application/fujixerox.docuworks.binder'
                        ),
                        'xbel' => array(
                                'application/xbel',
                                'application/xml'
                        ),
                        'xbl' => array(
                                'application/xml',
                                'text/plain',
                                'text/xml'
                        ),
                        'xbm' => array(
                                'image/xbitmap',
                                'text/c'
                        ),
                        'xca' => array(
                                'application/xcap-caps+xml'
                        ),
                        'xcat' => array(
                                'text/plain'
                        ),
                        'xcf' => array(
                                'image/xcf'
                        ),
                        'xconf' => array(
                                'text/plain'
                        ),
                        'xcs' => array(
                                'application/calendar+xml'
                        ),
                        'xct' => array(
                                'application/fujixerox.docuworks.container'
                        ),
                        'xdd' => array(
                                'application/bacnet-xdd+zip'
                        ),
                        'xdf' => array(
                                'application/mrb-consumer+xml',
                                'application/mrb-publish+xml',
                                'application/xcap-diff+xml'
                        ),
                        'xdgapp' => array(
                                'application/flatpak',
                                'application/xdgapp'
                        ),
                        'xdm' => array(
                                'application/syncml.dm+xml'
                        ),
                        'xdp' => array(
                                'application/adobe.xdp+xml'
                        ),
                        'xdssc' => array(
                                'application/dssc+xml'
                        ),
                        'xdw' => array(
                                'application/fujixerox.docuworks'
                        ),
                        'xegrm' => array(
                                'text/plain'
                        ),
                        'xel' => array(
                                'application/xcap-el+xml'
                        ),
                        'xenc' => array(
                                'application/xenc+xml'
                        ),
                        'xer' => array(
                                'application/patch-ops-error+xml',
                                'application/xcap-error+xml'
                        ),
                        'xfd' => array(
                                'application/xfdl'
                        ),
                        'xfdf' => array(
                                'application/adobe.xfdf'
                        ),
                        'xfdl' => array(
                                'application/xfdl'
                        ),
                        'xgrm' => array(
                                'text/plain'
                        ),
                        'xht' => array(
                                'application/xhtml+xml',
                                'application/xml'
                        ),
                        'xhtm' => array(
                                'application/pwg-xhtml-print+xml'
                        ),
                        'xhtml' => array(
                                'application/pwg-xhtml-print+xml',
                                'application/xhtml+xml',
                                'application/xml'
                        ),
                        'xhvml' => array(
                                'application/xv+xml'
                        ),
                        'xi' => array(
                                'audio/xi'
                        ),
                        'xif' => array(
                                'image/xiff'
                        ),
                        'xla' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xlam' => array(
                                'application/ms-excel.addin.macroenabled.12',
                                'application/openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/tika-ooxml'
                        ),
                        'xlc' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xld' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xlex' => array(
                                'text/plain'
                        ),
                        'xlf' => array(
                                'application/xliff',
                                'application/xliff+xml',
                                'application/xml'
                        ),
                        'xliff' => array(
                                'application/xliff',
                                'application/xml'
                        ),
                        'xlim' => array(
                                'application/xmpie.xlim'
                        ),
                        'xll' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xlm' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xlog' => array(
                                'text/plain'
                        ),
                        'xlr' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/ms-works',
                                'application/ole-storage',
                                'application/tika-msworks-spreadsheet',
                                'application/xml'
                        ),
                        'xls' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xlsb' => array(
                                'application/ms-excel.sheet.binary.macroenabled.12',
                                'application/openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/tika-ooxml'
                        ),
                        'xlsm' => array(
                                'application/ms-excel.sheet.macroenabled.12',
                                'application/openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'xlsx' => array(
                                'application/openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'xlt' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xltm' => array(
                                'application/ms-excel.template.macroenabled.12',
                                'application/openxmlformats-officedocument.spreadsheetml.template',
                                'application/tika-ooxml'
                        ),
                        'xltx' => array(
                                'application/openxmlformats-officedocument.spreadsheetml-template',
                                'application/openxmlformats-officedocument.spreadsheetml.sheet',
                                'application/openxmlformats-officedocument.spreadsheetml.template',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'xlw' => array(
                                'application/ms-excel',
                                'application/ms-office',
                                'application/msexcel',
                                'application/tika-msoffice',
                                'application/xml',
                                'zz-application/zz-winassoc-xls'
                        ),
                        'xm' => array(
                                'audio/xm'
                        ),
                        'xmap' => array(
                                'text/plain'
                        ),
                        'xmf' => array(
                                'audio/mobile-xmf',
                                'audio/xmf'
                        ),
                        'xmi' => array(
                                'application/xml',
                                'text/xmi'
                        ),
                        'xmind' => array(
                                'application/xmind',
                                'application/zip'
                        ),
                        'xml' => array(
                                'application/amundsen.maze+xml',
                                'application/avistar+xml',
                                'application/cea-2018+xml',
                                'application/conference-info+xml',
                                'application/cpl+xml',
                                'application/cyan.dean.root+xml',
                                'application/dialog-info+xml',
                                'application/dicom+xml',
                                'application/emergencycalldata.comment+xml',
                                'application/emergencycalldata.control+xml',
                                'application/emergencycalldata.deviceinfo+xml',
                                'application/emergencycalldata.providerinfo+xml',
                                'application/emergencycalldata.serviceinfo+xml',
                                'application/emergencycalldata.subscriberinfo+xml',
                                'application/emergencycalldata.veds+xml',
                                'application/epp+xml',
                                'application/eprints.data+xml',
                                'application/etsi.pstn+xml',
                                'application/gov.sk.e-form+xml',
                                'application/gov.sk.xmldatacontainer+xml',
                                'application/informedcontrol.rms+xml',
                                'application/infotech.project+xml',
                                'application/iptc.g2.catalogitem+xml',
                                'application/iptc.g2.conceptitem+xml',
                                'application/iptc.g2.knowledgeitem+xml',
                                'application/iptc.g2.newsitem+xml',
                                'application/iptc.g2.newsmessage+xml',
                                'application/iptc.g2.packageitem+xml',
                                'application/iptc.g2.planningitem+xml',
                                'application/load-control+xml',
                                'application/media-policy-dataset+xml',
                                'application/oma.dd2+xml',
                                'application/openxmlformats-officedocument.custom-properties+xml',
                                'application/openxmlformats-officedocument.customxmlproperties+xml',
                                'application/openxmlformats-officedocument.drawing+xml',
                                'application/openxmlformats-officedocument.drawingml.chart+xml',
                                'application/openxmlformats-officedocument.drawingml.chartshapes+xml',
                                'application/openxmlformats-officedocument.drawingml.diagramcolors+xml',
                                'application/openxmlformats-officedocument.drawingml.diagramdata+xml',
                                'application/openxmlformats-officedocument.drawingml.diagramlayout+xml',
                                'application/openxmlformats-officedocument.drawingml.diagramstyle+xml',
                                'application/openxmlformats-officedocument.extended-properties+xml',
                                'application/openxmlformats-officedocument.presentationml.commentauthors+xml',
                                'application/openxmlformats-officedocument.presentationml.comments+xml',
                                'application/openxmlformats-officedocument.presentationml.handoutmaster+xml',
                                'application/openxmlformats-officedocument.presentationml.notesmaster+xml',
                                'application/openxmlformats-officedocument.presentationml.notesslide+xml',
                                'application/openxmlformats-officedocument.presentationml.presentation.main+xml',
                                'application/openxmlformats-officedocument.presentationml.presprops+xml',
                                'application/openxmlformats-officedocument.presentationml.slide+xml',
                                'application/openxmlformats-officedocument.presentationml.slidelayout+xml',
                                'application/openxmlformats-officedocument.presentationml.slidemaster+xml',
                                'application/openxmlformats-officedocument.presentationml.slideshow.main+xml',
                                'application/openxmlformats-officedocument.presentationml.slideupdateinfo+xml',
                                'application/openxmlformats-officedocument.presentationml.tablestyles+xml',
                                'application/openxmlformats-officedocument.presentationml.tags+xml',
                                'application/openxmlformats-officedocument.presentationml.template.main+xml',
                                'application/openxmlformats-officedocument.presentationml.viewprops+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.calcchain+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.chartsheet+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.comments+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.connections+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.dialogsheet+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.externallink+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.pivotcachedefinition+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.pivotcacherecords+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.pivottable+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.querytable+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.revisionheaders+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.revisionlog+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.sharedstrings+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.sheet.main+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.sheetmetadata+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.styles+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.table+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.tablesinglecells+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.template.main+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.usernames+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.volatiledependencies+xml',
                                'application/openxmlformats-officedocument.spreadsheetml.worksheet+xml',
                                'application/openxmlformats-officedocument.theme+xml',
                                'application/openxmlformats-officedocument.themeoverride+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.comments+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.document.glossary+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.document.main+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.endnotes+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.fonttable+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.footer+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.footnotes+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.numbering+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.settings+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.styles+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.template.main+xml',
                                'application/openxmlformats-officedocument.wordprocessingml.websettings+xml',
                                'application/openxmlformats-package.core-properties+xml',
                                'application/openxmlformats-package.digital-signature-xmlsignature+xml',
                                'application/openxmlformats-package.relationships+xml',
                                'application/pidf-diff+xml',
                                'application/prs.xsf+xml',
                                'application/recordare.musicxml+xml',
                                'application/reginfo+xml',
                                'application/rfc+xml',
                                'application/simple-filter+xml',
                                'application/tmd.mediaflex.api+xml',
                                'application/watcherinfo+xml',
                                'application/xcon-conference-info+xml',
                                'application/xcon-conference-info-diff+xml',
                                'application/xenc+xml',
                                'application/xml',
                                'application/xml-external-parsed-entity',
                                'application/yamaha.openscoreformat.osfpvg+xml',
                                'message/imdn+xml',
                                'text/iptc.newsml',
                                'text/iptc.nitf',
                                'text/plain',
                                'text/xml',
                                'text/xml-external-parsed-entity'
                        ),
                        'xmls' => array(
                                'application/dskpp+xml'
                        ),
                        'xmp' => array(
                                'application/rdf+xml',
                                'application/xml'
                        ),
                        'xns' => array(
                                'application/xcap-ns+xml'
                        ),
                        'xo' => array(
                                'application/olpc-sugar'
                        ),
                        'xodp' => array(
                                'application/collabio.xodocuments.presentation'
                        ),
                        'xods' => array(
                                'application/collabio.xodocuments.spreadsheet'
                        ),
                        'xodt' => array(
                                'application/collabio.xodocuments.document'
                        ),
                        'xop' => array(
                                'application/xop+xml'
                        ),
                        'xott' => array(
                                'application/collabio.xodocuments.document-template'
                        ),
                        'xpi' => array(
                                'application/xpinstall',
                                'application/zip'
                        ),
                        'xpl' => array(
                                'application/xproc+xml'
                        ),
                        'xpm' => array(
                                'image/xpixmap',
                                'image/xpm'
                        ),
                        'xport' => array(
                                'application/sas-xport'
                        ),
                        'xpr' => array(
                                'application/is-xpr'
                        ),
                        'xps' => array(
                                'application/ms-xpsdocument',
                                'application/oxps',
                                'application/tika-ooxml',
                                'application/zip'
                        ),
                        'xpt' => array(
                                'application/sas-xport'
                        ),
                        'xpw' => array(
                                'application/intercon.formnet'
                        ),
                        'xpx' => array(
                                'application/intercon.formnet'
                        ),
                        'xq' => array(
                                'application/xquery',
                                'text/plain'
                        ),
                        'xquery' => array(
                                'application/xquery',
                                'text/plain'
                        ),
                        'xroles' => array(
                                'text/plain'
                        ),
                        'xsamples' => array(
                                'text/plain'
                        ),
                        'xsd' => array(
                                'application/xml',
                                'text/plain',
                                'text/xml'
                        ),
                        'xsf' => array(
                                'application/prs.xsf+xml'
                        ),
                        'xsl' => array(
                                'application/xml',
                                'application/xslt+xml',
                                'text/plain',
                                'text/xml'
                        ),
                        'xslfo' => array(
                                'application/xml',
                                'application/xslfo+xml',
                                'text/xsl',
                                'text/xslfo'
                        ),
                        'xslt' => array(
                                'application/xml',
                                'application/xslt+xml',
                                'text/xsl'
                        ),
                        'xsm' => array(
                                'application/syncml+xml'
                        ),
                        'xsp' => array(
                                'text/plain'
                        ),
                        'xspf' => array(
                                'application/xml',
                                'application/xspf+xml'
                        ),
                        'xul' => array(
                                'application/mozilla.xul+xml',
                                'application/xml'
                        ),
                        'xvm' => array(
                                'application/xv+xml'
                        ),
                        'xvml' => array(
                                'application/xv+xml'
                        ),
                        'xwd' => array(
                                'image/xwindowdump'
                        ),
                        'xweb' => array(
                                'text/plain'
                        ),
                        'xwelcome' => array(
                                'text/plain'
                        ),
                        'xyz' => array(
                                'chemical/xyz'
                        ),
                        'xyze' => array(
                                'image/radiance'
                        ),
                        'xz' => array(
                                'application/xz'
                        ),
                        'yaml' => array(
                                'application/yaml',
                                'text/plain',
                                'text/yaml'
                        ),
                        'yang' => array(
                                'application/yang'
                        ),
                        'yin' => array(
                                'application/yin+xml'
                        ),
                        'yme' => array(
                                'application/yaoweme'
                        ),
                        'yml' => array(
                                'application/yaml',
                                'text/plain',
                                'text/yaml'
                        ),
                        'z1' => array(
                                'application/zmachine'
                        ),
                        'z2' => array(
                                'application/zmachine'
                        ),
                        'z3' => array(
                                'application/zmachine'
                        ),
                        'z4' => array(
                                'application/zmachine'
                        ),
                        'z5' => array(
                                'application/zmachine'
                        ),
                        'z6' => array(
                                'application/zmachine'
                        ),
                        'z64' => array(
                                'application/n64-rom'
                        ),
                        'z7' => array(
                                'application/zmachine'
                        ),
                        'z8' => array(
                                'application/zmachine'
                        ),
                        'zabw' => array(
                                'application/abiword',
                                'application/xml'
                        ),
                        'zaz' => array(
                                'application/zzazz.deck+xml'
                        ),
                        'zfc' => array(
                                'application/filmit.zfc'
                        ),
                        'zfo' => array(
                                'application/software602.filler.form-xml-zip'
                        ),
                        'zip' => array(
                                'application/easykaraoke.cdgdownload',
                                'application/gov.sk.e-form+zip',
                                'application/zip',
                                'application/zip-compressed'
                        ),
                        'zir' => array(
                                'application/zul'
                        ),
                        'zirz' => array(
                                'application/zul'
                        ),
                        'zmm' => array(
                                'application/handheld-entertainment+xml'
                        ),
                        'zoo' => array(
                                'application/zoo'
                        ),
                        'zrp' => array(
                                'application/rapid'
                        ),
                        'zsav' => array(
                                'application/spss-sav',
                                'application/spss-savefile'
                        ),
                        'zz' => array(
                                'application/zlib'
                        ),
                        '123' => array(
                                'application/123',
                                'application/lotus-1-2-3',
                                'application/lotus123',
                                'application/wk1',
                                'zz-application/zz-winassoc-123'
                        ),
                        '602' => array(
                                'application/t602'
                        ),
                        '669' => array(
                                'audio/mod'
                        ),
                        '19051' => array(
                                'application/ieee.1905'
                        )
                );
        }
        /**
         * Filters Aliases
         *
         * @since 5.0.0
         *
         * @param array $aliases MIME aliases organized by file extension.
         */
        return apply_filters( 'wp_get_mime_aliases', $aliases );
}