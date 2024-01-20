@extends('layouts.app')

@section('title', 'Games Collections')

@section('content')
    <div class="app-title">
        <div>
            <h1>Games Collections</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Games Collection Form</h3>
                <div class="tile-body">
                    <form action="{{ route('games-collection.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Game Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                        type="text" placeholder="Enter Game Name">
                                    @error('name')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="console">Console</label>
                                    <select class="form-control @error('console_id') is-invalid @enderror" id="console"
                                        name="console_id">
                                        <option value="">Select Console</option>
                                        @if ($consoles->count() > 0)
                                            @foreach ($consoles as $console)
                                                <option value="{{ $console->id }}" {{ old('console_id') == $console->id ? 'selected' : '' }}>{{ $console->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('console_id')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="copies">Copies</label>
                                    <input class="form-control @error('copies') is-invalid @enderror" name="copies"
                                        type="number" placeholder="Enter Number of Copies" min="1" value="{{ (old('copies')) ? old('copies') : 1 }}">
                                    @error('copies')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="publisher">Publisher</label>
                                    <select class="form-control @error('publisher_id') is-invalid @enderror" id="publisher"
                                        name="publisher_id">
                                        <option value="">Select Publisher</option>
                                        @if ($publishers->count() > 0)
                                            @foreach ($publishers as $publisher)
                                                <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('publisher_id')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="developer">Developer</label>
                                    <select class="form-control @error('developer_id') is-invalid @enderror" id="developer"
                                        name="developer_id">
                                        <option value="">Select Developer</option>
                                        @if ($developers->count() > 0)
                                            @foreach ($developers as $developer)
                                                <option value="{{ $developer->id }}" {{ old('developer_id') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('developer_id')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="language">Language</label>
                                    <select class="form-control @error('language_id') is-invalid @enderror" id="language"
                                        name="language_id">
                                        <option value="">Select Language</option>
                                        @if ($languages->count() > 0)
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}" {{ old('language_id') == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('language_id')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="fsk">FSK</label>
                                    <select class="form-control @error('fsk_id') is-invalid @enderror" id="fsk"
                                        name="fsk_id">
                                        <option value="">Select FSK</option>
                                        @if ($fsks->count() > 0)
                                            @foreach ($fsks as $fsk)
                                                <option value="{{ $fsk->id }}" {{ old('fsk_id') == $fsk->id ? 'selected' : '' }}>{{ $fsk->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('fsk_id')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="year">Release Year</label>
                                    <select class="form-control @error('year') is-invalid @enderror" id="year"
                                        name="year">
                                        <option value="" {{ (old('year') == '') ? 'selected' : '' }}>Select Release Year</option>
                                        <option value="1985" {{ (old('year') == '1985') ? 'selected' : '' }}>1985</option>
                                        <option value="1986" {{ (old('year') == '1986') ? 'selected' : ''  }}>1986</option>
                                        <option value="1987" {{ (old('year') == '1987') ? 'selected' : ''  }}>1987</option>
                                        <option value="1988" {{ (old('year') == '1988') ? 'selected' : ''  }}>1988</option>
                                        <option value="1989" {{ (old('year') == '1989') ? 'selected' : ''  }}>1989</option>
                                        <option value="1990" {{ (old('year') == '1990') ? 'selected' : ''  }}>1990</option>
                                        <option value="1991" {{ (old('year') == '1991') ? 'selected' : ''  }}>1991</option>
                                        <option value="1992" {{ (old('year') == '1992') ? 'selected' : ''  }}>1992</option>
                                        <option value="1993" {{ (old('year') == '1993') ? 'selected' : ''  }}>1993</option>
                                        <option value="1994" {{ (old('year') == '1994') ? 'selected' : ''  }}>1994</option>
                                        <option value="1995" {{ (old('year') == '1995') ? 'selected' : ''  }}>1995</option>
                                        <option value="1996" {{ (old('year') == '1996') ? 'selected' : ''  }}>1996</option>
                                        <option value="1997" {{ (old('year') == '1997') ? 'selected' : ''  }}>1997</option>
                                        <option value="1998" {{ (old('year') == '1998') ? 'selected' : ''  }}>1998</option>
                                        <option value="1999" {{ (old('year') == '1999') ? 'selected' : ''  }}>1999</option>
                                        <option value="2000" {{ (old('year') == '2000') ? 'selected' : ''  }}>2000</option>
                                        <option value="2001" {{ (old('year') == '2001') ? 'selected' : ''  }}>2001</option>
                                        <option value="2002" {{ (old('year') == '2002') ? 'selected' : ''  }}>2002</option>
                                        <option value="2003" {{ (old('year') == '2003') ? 'selected' : ''  }}>2003</option>
                                        <option value="2004" {{ (old('year') == '2004') ? 'selected' : ''  }}>2004</option>
                                        <option value="2005" {{ (old('year') == '2005') ? 'selected' : ''  }}>2005</option>
                                        <option value="2006" {{ (old('year') == '2006') ? 'selected' : ''  }}>2006</option>
                                        <option value="2007" {{ (old('year') == '2007') ? 'selected' : ''  }}>2007</option>
                                        <option value="2008" {{ (old('year') == '2008') ? 'selected' : ''  }}>2008</option>
                                        <option value="2009" {{ (old('year') == '2009') ? 'selected' : ''  }}>2009</option>
                                        <option value="2010" {{ (old('year') == '2010') ? 'selected' : ''  }}>2010</option>
                                        <option value="2011" {{ (old('year') == '2011') ? 'selected' : ''  }}>2011</option>
                                        <option value="2012" {{ (old('year') == '2012') ? 'selected' : ''  }}>2012</option>
                                        <option value="2013" {{ (old('year') == '2013') ? 'selected' : ''  }}>2013</option>
                                        <option value="2014" {{ (old('year') == '2014') ? 'selected' : ''  }}>2014</option>
                                        <option value="2015" {{ (old('year') == '2015') ? 'selected' : ''  }}>2015</option>
                                        <option value="2016" {{ (old('year') == '2016') ? 'selected' : ''  }}>2016</option>
                                        <option value="2017" {{ (old('year') == '2017') ? 'selected' : ''  }}>2017</option>
                                        <option value="2018" {{ (old('year') == '2018') ? 'selected' : ''  }}>2018</option>
                                        <option value="2019" {{ (old('year') == '2019') ? 'selected' : ''  }}>2019</option>
                                        <option value="2020" {{ (old('year') == '2020') ? 'selected' : ''  }}>2020</option>
                                        <option value="2021" {{ (old('year') == '2021') ? 'selected' : ''  }}>2021</option>
                                        <option value="2022" {{ (old('year') == '2022') ? 'selected' : ''  }}>2022</option>
                                        <option value="2023" {{ (old('year') == '2023') ? 'selected' : ''  }}>2023</option>
                                        <option value="2024" {{ (old('year') == '2024') ? 'selected' : ''  }}>2024</option>
                                        <option value="2025" {{ (old('year') == '2025') ? 'selected' : ''  }}>2025</option>
                                        <option value="2026" {{ (old('year') == '2026') ? 'selected' : ''  }}>2026</option>
                                        <option value="2027" {{ (old('year') == '2027') ? 'selected' : ''  }}>2027</option>
                                        <option value="2028" {{ (old('year') == '2028') ? 'selected' : ''  }}>2028</option>
                                        <option value="2029" {{ (old('year') == '2029') ? 'selected' : ''  }}>2029</option>
                                        <option value="2030" {{ (old('year') == '2030') ? 'selected' : ''  }}>2030</option>
                                        <option value="2031" {{ (old('year') == '2031') ? 'selected' : ''  }}>2031</option>
                                        <option value="2032" {{ (old('year') == '2032') ? 'selected' : ''  }}>2032</option>
                                        <option value="2033" {{ (old('year') == '2033') ? 'selected' : ''  }}>2033</option>
                                        <option value="2034" {{ (old('year') == '2034') ? 'selected' : ''  }}>2034</option>
                                        <option value="2035" {{ (old('year') == '2035') ? 'selected' : ''  }}>2035</option>
                                        <option value="2036" {{ (old('year') == '2036') ? 'selected' : ''  }}>2036</option>
                                        <option value="2037" {{ (old('year') == '2037') ? 'selected' : ''  }}>2037</option>
                                        <option value="2038" {{ (old('year') == '2038') ? 'selected' : ''  }}>2038</option>
                                        <option value="2039" {{ (old('year') == '2039') ? 'selected' : ''  }}>2039</option>
                                        <option value="2040" {{ (old('year') == '2040') ? 'selected' : ''  }}>2040</option>
                                        <option value="2041" {{ (old('year') == '2041') ? 'selected' : ''  }}>2041</option>
                                        <option value="2042" {{ (old('year') == '2042') ? 'selected' : ''  }}>2042</option>
                                        <option value="2043" {{ (old('year') == '2043') ? 'selected' : ''  }}>2043</option>
                                        <option value="2044" {{ (old('year') == '2044') ? 'selected' : ''  }}>2044</option>
                                        <option value="2045" {{ (old('year') == '2045') ? 'selected' : ''  }}>2045</option>
                                        <option value="2046" {{ (old('year') == '2046') ? 'selected' : ''  }}>2046</option>
                                        <option value="2047" {{ (old('year') == '2047') ? 'selected' : ''  }}>2047</option>
                                        <option value="2048" {{ (old('year') == '2048') ? 'selected' : ''  }}>2048</option>
                                        <option value="2049" {{ (old('year') == '2049') ? 'selected' : ''  }}>2049</option>
                                        <option value="2050" {{ (old('year') == '2050') ? 'selected' : ''  }}>2050</option>
                                        <option value="2051" {{ (old('year') == '2051') ? 'selected' : ''  }}>2051</option>
                                        <option value="2052" {{ (old('year') == '2052') ? 'selected' : ''  }}>2052</option>
                                        <option value="2053" {{ (old('year') == '2053') ? 'selected' : ''  }}>2053</option>
                                        <option value="2054" {{ (old('year') == '2054') ? 'selected' : ''  }}>2054</option>
                                        <option value="2055" {{ (old('year') == '2055') ? 'selected' : ''  }}>2055</option>
                                        <option value="2056" {{ (old('year') == '2056') ? 'selected' : ''  }}>2056</option>
                                        <option value="2057" {{ (old('year') == '2057') ? 'selected' : ''  }}>2057</option>
                                        <option value="2058" {{ (old('year') == '2058') ? 'selected' : ''  }}>2058</option>
                                        <option value="2059" {{ (old('year') == '2059') ? 'selected' : ''  }}>2059</option>
                                        <option value="2060" {{ (old('year') == '2060') ? 'selected' : ''  }}>2060</option>
                                        <option value="2061" {{ (old('year') == '2061') ? 'selected' : ''  }}>2061</option>
                                        <option value="2062" {{ (old('year') == '2062') ? 'selected' : ''  }}>2062</option>
                                        <option value="2063" {{ (old('year') == '2063') ? 'selected' : ''  }}>2063</option>
                                        <option value="2064" {{ (old('year') == '2064') ? 'selected' : ''  }}>2064</option>
                                        <option value="2065" {{ (old('year') == '2065') ? 'selected' : ''  }}>2065</option>
                                        <option value="2066" {{ (old('year') == '2066') ? 'selected' : ''  }}>2066</option>
                                        <option value="2067" {{ (old('year') == '2067') ? 'selected' : ''  }}>2067</option>
                                        <option value="2068" {{ (old('year') == '2068') ? 'selected' : ''  }}>2068</option>
                                        <option value="2069" {{ (old('year') == '2069') ? 'selected' : ''  }}>2069</option>
                                        <option value="2070" {{ (old('year') == '2070') ? 'selected' : ''  }}>2070</option>
                                        <option value="2071" {{ (old('year') == '2071') ? 'selected' : ''  }}>2071</option>
                                        <option value="2072" {{ (old('year') == '2072') ? 'selected' : ''  }}>2072</option>
                                        <option value="2073" {{ (old('year') == '2073') ? 'selected' : ''  }}>2073</option>
                                        <option value="2074" {{ (old('year') == '2074') ? 'selected' : ''  }}>2074</option>
                                        <option value="2075" {{ (old('year') == '2075') ? 'selected' : ''  }}>2075</option>
                                        <option value="2076" {{ (old('year') == '2076') ? 'selected' : ''  }}>2076</option>
                                        <option value="2077" {{ (old('year') == '2077') ? 'selected' : ''  }}>2077</option>
                                        <option value="2078" {{ (old('year') == '2078') ? 'selected' : ''  }}>2078</option>
                                        <option value="2079" {{ (old('year') == '2079') ? 'selected' : ''  }}>2079</option>
                                        <option value="2080" {{ (old('year') == '2080') ? 'selected' : ''  }}>2080</option>
                                    </select>
                                    @error('year')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label" for="cover">Cover</label>
                                    <input class="form-control @error('cover') is-invalid @enderror" type="file"
                                        id="cover" name="cover">
                                    @error('cover')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="cover">&nbsp;</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bi bi-check-circle-fill me-2"></i>Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-secondary" href="{{ route('games-collection.index') }}"><i
                                                    class="bi bi-x-circle-fill me-2"></i>Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
